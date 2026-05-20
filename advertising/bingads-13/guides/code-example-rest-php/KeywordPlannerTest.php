<?php

use Microsoft\MsAds\Rest\ApiException;
use Microsoft\MsAds\Rest\Model\AdInsightService\AdGroupEstimator;
use Microsoft\MsAds\Rest\Model\AdInsightService\CampaignEstimator;
use Microsoft\MsAds\Rest\Model\AdInsightService\DateRangeSearchParameter;
use Microsoft\MsAds\Rest\Model\AdInsightService\DayMonthAndYear;
use Microsoft\MsAds\Rest\Model\AdInsightService\GetKeywordIdeasRequest;
use Microsoft\MsAds\Rest\Model\AdInsightService\GetKeywordTrafficEstimatesRequest;
use Microsoft\MsAds\Rest\Model\AdInsightService\Keyword;
use Microsoft\MsAds\Rest\Model\AdInsightService\KeywordEstimator;
use Microsoft\MsAds\Rest\Model\AdInsightService\KeywordIdea;
use Microsoft\MsAds\Rest\Model\AdInsightService\KeywordIdeaAttribute;
use Microsoft\MsAds\Rest\Model\AdInsightService\LanguageCriterion;
use Microsoft\MsAds\Rest\Model\AdInsightService\LanguageSearchParameter;
use Microsoft\MsAds\Rest\Model\AdInsightService\LocationCriterion;
use Microsoft\MsAds\Rest\Model\AdInsightService\LocationSearchParameter;
use Microsoft\MsAds\Rest\Model\AdInsightService\MatchType;
use Microsoft\MsAds\Rest\Model\AdInsightService\NegativeKeyword;
use Microsoft\MsAds\Rest\Model\AdInsightService\NetworkCriterion;
use Microsoft\MsAds\Rest\Model\AdInsightService\NetworkSearchParameter;
use Microsoft\MsAds\Rest\Model\AdInsightService\NetworkType;
use Microsoft\MsAds\Rest\Model\AdInsightService\QuerySearchParameter;
use Microsoft\MsAds\Rest\Test\RestApiTestBase;

class KeywordPlannerTest extends RestApiTestBase
{
    /**
     * @throws ApiException
     */
    public function testGetKeywordIdeas()
    {
        $ideaAttributes = [
            KeywordIdeaAttribute::AD_GROUP_ID,
            KeywordIdeaAttribute::AD_GROUP_NAME,
            KeywordIdeaAttribute::KEYWORD,
            KeywordIdeaAttribute::SOURCE,
            KeywordIdeaAttribute::MONTHLY_SEARCH_COUNTS,
            KeywordIdeaAttribute::SUGGESTED_BID,
            KeywordIdeaAttribute::COMPETITION,
            KeywordIdeaAttribute::RELEVANCE,
            KeywordIdeaAttribute::AD_IMPRESSION_SHARE
        ];
        $searchParameters = [];
        $searchParameters[] = new DateRangeSearchParameter([
            'StartDate' => new DayMonthAndYear([
                'Day' => 1,
                'Month' => 1,
                'Year' => date('Y')
            ]),
            'EndDate' => new DayMonthAndYear([
                'Day' => 1,
                'Month' => date('m') - 1,
                'Year' => date('Y')
            ])
        ]);
        $searchParameters[] = new QuerySearchParameter(
            [
                'Queries' => ["tennis", "tennis shoes", "running", "running shoes", "cross training", "running"]
            ]
        );
        $searchParameters[] = new LanguageSearchParameter([
            'Languages' => [new LanguageCriterion([
                'Language' => 'English',
                ]
            )]
        ]);
        $searchParameters[] = new LocationSearchParameter([
            'Locations' => [new LocationCriterion(
                [
                    'LocationId' => 190 // United States
                ]
            )]
        ]);
        $searchParameters[] = new NetworkSearchParameter([
            'Network' => new NetworkCriterion([
                'Network' => NetworkType::OWNED_AND_OPERATED_AND_SYNDICATED_SEARCH
            ])
        ]);
        $request = new GetKeywordIdeasRequest([
            'ExpandIdeas' => true,
            'IdeaAttributes' => $ideaAttributes,
            'SearchParameters' => $searchParameters
        ]);
        $response = self::$adInsightServiceApi->getKeywordIdeas($request);
        $ideas = $response->getKeywordIdeas();
        $this->assertNotEmpty($ideas);
        $this->assertGreaterThan(0, count($ideas));
        return $ideas;
    }

    /**
     * @depends testGetKeywordIdeas
     * @throws ApiException
     */
    public function testGetKeywordTrafficEstimates(array $ideas)
    {
        // Build ad group estimators from keyword ideas
        $ideaAdGroupIds = array();
        foreach ($ideas as $keywordIdea)
        {
            if (!$keywordIdea instanceof KeywordIdea) {
                continue;
            }
            $ideaAdGroupIds[] = $keywordIdea->getAdGroupId();
        }
        $adGroupIds = array_unique($ideaAdGroupIds, SORT_REGULAR);
        $adGroupEstimatorCount = count($adGroupIds);
        $seedOffset = in_array(null, $adGroupIds) ? 0 : 1;
        $adGroupEstimators = [];

        for($index = 0; $index < $adGroupEstimatorCount; $index++)
        {
            $adGroupEstimators[]  = new AdGroupEstimator([
                'KeywordEstimators' => [],
                'MaxCpc' => 5.00
            ]);
        }

        foreach ($ideas as $keywordIdea) {
            if (!$keywordIdea instanceof KeywordIdea) {
                continue;
            }
            $index = ($keywordIdea->getAdGroupId() != null) ? -($keywordIdea->getAdGroupId()) - $seedOffset : 0;
            $adGroupEstimators[$index]->setKeywordEstimators(
                array_merge(
                    $adGroupEstimators[$index]->getKeywordEstimators(),
                    [
                        new KeywordEstimator([
                            'Keyword' => new Keyword([
                                'Text' => $keywordIdea->getKeyword(),
                                'MatchType' => MatchType::EXACT
                            ]),
                            'MaxCpc' =>  $keywordIdea->getSuggestedBid() > 0.04 ? $keywordIdea->getSuggestedBid() : null
                        ])
                    ]
                )
            );
        }

        // Build campaign estimator
        $campaignEstimator = new CampaignEstimator([
            'AdGroupEstimators' => $adGroupEstimators,
            'DailyBudget' => 50.00,
            'NegativeKeywords' => [
                new NegativeKeyword([
                    'Text' => 'foo',
                    'MatchType' => MatchType::EXACT
                ])
            ],
            'Criteria' => [
                new LanguageCriterion([
                    'Language' => 'English'
                ]),
                new NetworkCriterion(
                    [
                        'Network' => NetworkType::OWNED_AND_OPERATED_AND_SYNDICATED_SEARCH
                    ]
                ),
                new LocationCriterion([
                    'LocationId' => 190, // United States
                ])
            ]
        ]);

        $request = new GetKeywordTrafficEstimatesRequest([
            'CampaignEstimators' => [$campaignEstimator]
        ]);
        $response = self::$adInsightServiceApi->getKeywordTrafficEstimates($request);
        $this->assertNotEmpty($response->getCampaignEstimates());
        $campaignEstimates = $response->getCampaignEstimates();
        print("Campaign Estimates:\n");
        print_r($campaignEstimates);
    }
}

