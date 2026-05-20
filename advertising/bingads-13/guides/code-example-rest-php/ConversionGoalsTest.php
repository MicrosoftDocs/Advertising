<?php

use Microsoft\MsAds\Rest\ApiException;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\AddConversionGoalsRequest;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\AddUetTagsRequest;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\AppInstallGoal;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\ConversionGoalAdditionalField;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\ConversionGoalCategory;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\ConversionGoalCountType;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\ConversionGoalRevenue;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\ConversionGoalRevenueType;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\ConversionGoalStatus;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\ConversionGoalType;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\DeleteCampaignConversionGoalsRequest;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\DurationGoal;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\EntityScope;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\EventGoal;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\ExpressionOperator;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\GetConversionGoalsByIdsRequest;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\GetUetTagsByIdsRequest;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\PagesViewedPerVisitGoal;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\UetTag;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\UpdateConversionGoalsRequest;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\UrlGoal;
use Microsoft\MsAds\Rest\Model\CampaignManagementService\ValueOperator;
use Microsoft\MsAds\Rest\Test\RestApiTestBase;

class ConversionGoalsTest extends RestApiTestBase
{

    protected array $conversionGoalTypes = array(
        ConversionGoalType::APP_INSTALL,
        ConversionGoalType::DURATION,
        ConversionGoalType::EVENT,
        ConversionGoalType::PAGES_VIEWED_PER_VISIT,
        ConversionGoalType::URL
    );

    protected array $returnAdditionalFields = array(
        ConversionGoalAdditionalField::VIEW_THROUGH_CONVERSION_WINDOW_IN_MINUTES,
        ConversionGoalAdditionalField::IS_EXTERNALLY_ATTRIBUTED,
        ConversionGoalAdditionalField::GOAL_CATEGORY
    );

    /**
     * @throws ApiException
     */
    public function testAddUetTags()
    {
        // Before you can track conversions or target audiences using a remarketing list
        // you need to create a UET tag, and then add the UET tag tracking code to every page of your website.
        // For more information, please see Universal Event Tracking at https://go.microsoft.com/fwlink/?linkid=829965.

        // First you should call the GetUetTagsByIds operation to check whether a tag has already been created.
        // You can leave the TagIds element null or empty to request all UET tags available for the customer.
        print("-----\r\nGetUetTagsByIds:\r\n");
        $request = new GetUetTagsByIdsRequest([
            'TagIds' => null
        ]);
        $response = self::$campaignManagementServiceApi->getUetTagsByIds($request);
        $uetTags = $response->getUetTags() ?? [];
        print("UetTags:\r\n");
        print_r($uetTags);
        print("PartialErrors:\r\n");
        print_r($response->getPartialErrors());
        self::assertEmpty($response->getPartialErrors());

        // If you do not already have a UET tag that can be used, or if you need another UET tag,
        // call the AddUetTags service operation to create a new UET tag. If the call is successful,
        // the tracking script that you should add to your website is included in a corresponding
        // UetTag within the response message.

        if (count($uetTags) == 0) {
            print("-----\r\nAdding UET Tags:\r\n");

            $uetTag = new UetTag();
            $uetTag->setName("New UET Tag".self::generateRandomAlphaNumeric());
            $uetTag->setDescription("My First UET Tag".self::generateRandomAlphaNumeric());

            $request = new AddUetTagsRequest([
                'UetTags' => [$uetTag]
            ]);

            $response = self::$campaignManagementServiceApi->addUetTags($request);
            $uetTags = $response->getUetTags() ?? [];
            print("UetTags:\r\n");
            print_r($uetTags);
            print("PartialErrors:\r\n");
            print_r($response->getPartialErrors());
            self::assertEmpty($response->getPartialErrors());
        } else {
            print("-----\r\nUET Tag already exists\r\n");
        }
        self::assertNotEmpty($uetTags);

        return $uetTags[0]->getId();
    }

    /**
     * @depends testAddUetTags
     * @throws ApiException
     */
    public function testAddConversionGoals($tagId)
    {
        // Add conversion goals that depend on the UET Tag Id retrieved above.
        // Please note that you cannot delete conversion goals. If you want to stop
        // tracking conversions for the goal, you can set the goal status to Paused.
        print("-----\r\nAdding Conversion Goals:\r\n");

        $durationGoal = new DurationGoal();
        $durationGoal->setName("My Duration Goal".self::generateRandomAlphaNumeric());
        $durationGoal->setConversionWindowInMinutes(30);
        $durationGoal->setCountType(ConversionGoalCountType::ALL);
        $durationGoal->setMinimumDurationInSeconds(60);
        $durationGoal->setScope(EntityScope::ACCOUNT);
        $durationGoal->setStatus(ConversionGoalStatus::ACTIVE);
        $durationGoal->setTagId($tagId);

        $revenue = new ConversionGoalRevenue();
        $revenue->setType(ConversionGoalRevenueType::FIXED_VALUE);
        $revenue->setValue(5.00);
        $durationGoal->setRevenue($revenue);


        $eventGoal = new EventGoal();
        // The type of user interaction you want to track.
        $eventGoal->setActionExpression("play");
        $eventGoal->setActionOperator(ExpressionOperator::CONTAINS);
        // The category of event you want to track.
        $eventGoal->setCategoryExpression("video");
        $eventGoal->setCategoryOperator(ExpressionOperator::CONTAINS);
        $eventGoal->setConversionWindowInMinutes(30);
        $eventGoal->setCountType(ConversionGoalCountType::ALL);
        // The name of the element that caused the action.
        $eventGoal->setLabelExpression("trailer");
        $eventGoal->setLabelOperator(ExpressionOperator::CONTAINS);
        $eventGoal->setName("My Event Goal".self::generateRandomAlphaNumeric());
        $eventGoal->setScope(EntityScope::ACCOUNT);
        $eventGoal->setStatus(ConversionGoalStatus::ACTIVE);
        $eventGoal->setTagId($tagId);
        // A numerical value associated with that event.
        // Could be length of the video played etc.
        $eventGoal->setValue(5.00);
        $eventGoal->setValueOperator(ValueOperator::EQUALS);
        // Required as of June 2021. Previously if you left this element nil or empty, the default category was set to None.
        $eventGoal->setGoalCategory(ConversionGoalCategory::ADD_TO_CART);

        $revenue = new ConversionGoalRevenue();
        $revenue->setType(ConversionGoalRevenueType::FIXED_VALUE);
        $revenue->setValue(5.00);
        $eventGoal->setRevenue($revenue);

        $pagesViewedPerVisitGoal = new PagesViewedPerVisitGoal();
        $pagesViewedPerVisitGoal->setConversionWindowInMinutes(30);
        $pagesViewedPerVisitGoal->setCountType(ConversionGoalCountType::ALL);
        $pagesViewedPerVisitGoal->setMinimumPagesViewed(5);
        $pagesViewedPerVisitGoal->setName("My Pages Viewed Per Visit Goal".self::generateRandomAlphaNumeric());
        $pagesViewedPerVisitGoal->setScope(EntityScope::ACCOUNT);
        $pagesViewedPerVisitGoal->setStatus(ConversionGoalStatus::ACTIVE);
        $pagesViewedPerVisitGoal->setTagId($tagId);

        $revenue = new ConversionGoalRevenue();
        $revenue->setType(ConversionGoalRevenueType::FIXED_VALUE);
        $revenue->setValue(5.00);
        $pagesViewedPerVisitGoal->setRevenue($revenue);


        $urlGoal = new UrlGoal();
        $urlGoal->setConversionWindowInMinutes(30);
        $urlGoal->setCountType(ConversionGoalCountType::ALL);
        $urlGoal->setName("My URL Goal".self::generateRandomAlphaNumeric());
        $urlGoal->setUrlExpression("contoso");
        $urlGoal->setUrlOperator(ExpressionOperator::CONTAINS);
        $urlGoal->setScope(EntityScope::ACCOUNT);
        $urlGoal->setStatus(ConversionGoalStatus::ACTIVE);
        $urlGoal->setTagId($tagId);
        $urlGoal->setGoalCategory(ConversionGoalCategory::ADD_TO_CART);

        $revenue = new ConversionGoalRevenue();
        $revenue->setType(ConversionGoalRevenueType::FIXED_VALUE);
        $revenue->setValue(5.00);
        $urlGoal->setRevenue($revenue);

        $appInstallGoal = new AppInstallGoal();
        // You must provide a valid app platform and app store identifier,
        // otherwise this goal will not be added successfully.
        $appInstallGoal->setAppPlatform("Windows");
        $appInstallGoal->setAppStoreId("AppStoreIdGoesHere");
        $appInstallGoal->setConversionWindowInMinutes(30);
        $appInstallGoal->setCountType(ConversionGoalCountType::ALL);
        $appInstallGoal->setName("My App Install Goal".self::generateRandomAlphaNumeric());
        // Account scope is not supported for app install goals. You can
        // set scope to Customer or don't set it for the same result.
        $appInstallGoal->setScope(EntityScope::CUSTOMER);
        $appInstallGoal->setStatus(ConversionGoalStatus::ACTIVE);
        // The TagId is inherited from the ConversionGoal base class,
        // however, App Install goals do not use a UET tag.

        $revenue = new ConversionGoalRevenue();
        $revenue->setType(ConversionGoalRevenueType::FIXED_VALUE);
        $revenue->setValue(5.00);
        $appInstallGoal->setRevenue($revenue);

        $request = new AddConversionGoalsRequest([
            'ConversionGoals' => [$durationGoal, $eventGoal, $pagesViewedPerVisitGoal, $urlGoal, $appInstallGoal]
        ]);

        $response = self::$campaignManagementServiceApi->addConversionGoals($request);
        $goalIds = $response->getConversionGoalIds() ?? [];
        print("ConversionGoalIds:\r\n");
        print_r($goalIds);
        print("PartialErrors:\r\n");
        print_r($response->getPartialErrors());
        self::assertEmpty($response->getPartialErrors());
        self::assertNotEmpty($goalIds);

        return array_values(array_filter($goalIds));
    }

    /**
     * @depends testAddConversionGoals
     * @throws ApiException
     */
    public function testGetConversionGoalsByIds($goalIds)
    {
        print("-----\r\nFetching Conversion Goals:\r\n");

        $request = new GetConversionGoalsByIdsRequest([
            'ConversionGoalIds' => $goalIds,
            'ConversionGoalTypes' => $this->conversionGoalTypes,
            'ReturnAdditionalFields' => $this->returnAdditionalFields
        ]);

        $response = self::$campaignManagementServiceApi->getConversionGoalsByIds($request);
        $conversionGoals = $response->getConversionGoals() ?? [];
        print("ConversionGoals:\r\n");
        print_r($conversionGoals);
        print("PartialErrors:\r\n");
        print_r($response->getPartialErrors());
        self::assertEmpty($response->getPartialErrors());
        self::assertNotEmpty($conversionGoals);
    }

    /**
     * @depends testAddConversionGoals
     * @depends testGetConversionGoalsByIds
     * @throws ApiException
     */
    public function testUpdateConversionGoals($goalIds)
    {
        print("-----\r\nUpdating Conversion Goals:\r\n");

        $updateDurationGoal = new DurationGoal();
        // You can change the conversion goal type e.g. in this example an event goal
        // had been created above at index 1. Now we are using the returned identifier
        // at index 1 to update the type from EventGoal to DurationGoal.
        $updateDurationGoal->setId($goalIds[1]);
        $updateDurationGoal->setName("Updated Duration Goal".self::generateRandomAlphaNumeric());
        $updateDurationGoal->setConversionWindowInMinutes(60);
        $updateDurationGoal->setCountType(ConversionGoalCountType::UNIQUE);
        $updateDurationGoal->setMinimumDurationInSeconds(120);
        $updateDurationGoal->setStatus(ConversionGoalStatus::PAUSED);
        // The Scope cannot be updated, even if you update the goal type.
        // You can either send the same value or leave Scope empty.
        $updateDurationGoal->setScope(EntityScope::ACCOUNT);

        $revenue = new ConversionGoalRevenue();
        $revenue->setType(ConversionGoalRevenueType::FIXED_VALUE);
        $revenue->setValue(10.00);
        $updateDurationGoal->setRevenue($revenue);
        // You can update the tag as needed. In this example we will explicitly use the same UET tag.
        // To keep the UET tag unchanged, you can also leave this element nil or empty.
        // Update Event Goal

        $updateEventGoal = new EventGoal();
        // For both add and update conversion goal operations, you must include one or more
        // of the following event operator pairs:
        // (ActionOperator and ActionExpression), (CategoryOperator and CategoryExpression),
        // (LabelOperator and LabelExpression), (ValueOperator and Value).
        // Each event pair (e.g. ActionOperator and ActionExpression) is optional if you include
        // one or more of the other events.

        // For example if you do not include ActionOperator and ActionExpression during update,
        // any existing ActionOperator and ActionExpression settings will be deleted.
        $updateEventGoal->setId($goalIds[0]);
        $updateEventGoal->setCategoryExpression("video");
        $updateEventGoal->setCategoryOperator(ExpressionOperator::EQUALS);
        $updateEventGoal->setConversionWindowInMinutes(30);
        $updateEventGoal->setCountType(ConversionGoalCountType::ALL);
        // You cannot update the expression unless you also include the expression.
        // Likewise, you cannot update the operator unless you also include the expression.
        // The following attempt to update LabelOperator will result in an error.
        $updateEventGoal->setLabelExpression(null);
        $updateEventGoal->setLabelOperator(ExpressionOperator::EQUALS);
        $updateEventGoal->setName("My Updated Event Goal".self::generateRandomAlphaNumeric());
        // You must specify the previous settings for Value and ValueOperator,
        // unless you want them deleted during the update conversion goal operation.
        $updateEventGoal->setValue(5.00);
        $updateEventGoal->setValueOperator(ValueOperator::EQUALS);

        $eventGoalRevenue = new ConversionGoalRevenue();
        $eventGoalRevenue->setType(ConversionGoalRevenueType::FIXED_VALUE);
        $eventGoalRevenue->setValue(5.00);
        $updateEventGoal->setRevenue($eventGoalRevenue);

        // Update Pages Viewed Per Visit Goal
        $updatePagesViewedPerVisitGoal = new PagesViewedPerVisitGoal();
        $updatePagesViewedPerVisitGoal->setId($goalIds[2]);
        $updatePagesViewedPerVisitGoal->setName("My Updated Pages Viewed Per Visit Goal".self::generateRandomAlphaNumeric());
        // When updating a conversion goal, if the Revenue element is nil or empty then none
        // of the nested properties will be updated. However, if this element is not nil or empty
        // then you are effectively replacing any existing revenue properties. For example to delete
        // any previous revenue settings, set the Revenue element to an empty ConversionGoalRevenue object.

        $pagesViewedRevenue = new ConversionGoalRevenue();
        $updatePagesViewedPerVisitGoal->setRevenue($pagesViewedRevenue);

        // Update URL Goal
        $updateUrlGoal = new UrlGoal();
        $updateUrlGoal->setId($goalIds[3]);
        $updateUrlGoal->setName("My Updated Url Goal".self::generateRandomAlphaNumeric());
        // If not specified during update, the previous Url settings are retained.
        // If the expression is set, then the operator must also be set, and vice versa.
        $updateUrlGoal->setUrlExpression("contoso");
        $updateUrlGoal->setUrlOperator(ExpressionOperator::BEGINS_WITH);

        $request = new UpdateConversionGoalsRequest([
            'ConversionGoals' => [$updateDurationGoal, $updateEventGoal, $updatePagesViewedPerVisitGoal, $updateUrlGoal]
        ]);

        print("-----\r\nUpdateConversionGoals:\r\n");
        $response = self::$campaignManagementServiceApi->updateConversionGoals($request);
        print("PartialErrors:\r\n");
        print_r($response->getPartialErrors());
        self::assertNotEmpty($response->getPartialErrors());
        self::assertEquals('InvalidEventGoalLabelExpression', $response->getPartialErrors()[0]->getErrorCode());

        print("-----\r\nGetConversionGoalsByIds:\r\n");
        $request = new GetConversionGoalsByIdsRequest([
            'ConversionGoalIds' => $goalIds,
            'ConversionGoalTypes' => $this->conversionGoalTypes,
            'ReturnAdditionalFields' => $this->returnAdditionalFields
        ]);
        $response = self::$campaignManagementServiceApi->getConversionGoalsByIds($request);
        $conversionGoals = $response->getConversionGoals() ?? [];
        print("ConversionGoals:\r\n");
        print_r($conversionGoals);
        print("PartialErrors:\r\n");
        print_r($response->getPartialErrors());
        self::assertEmpty($response->getPartialErrors());
        self::assertNotEmpty($conversionGoals);
        return $goalIds;
    }

    /**
     * @depends testUpdateConversionGoals
     * @throws ApiException
     */
    public function deleteConversionGoals($goalIds)
    {
        print("-----\r\nDeleting Conversion Goals:\r\n");
        $request = new DeleteCampaignConversionGoalsRequest([
            'ConversionGoals' => $goalIds
        ]);
        $response = self::$campaignManagementServiceApi->deleteCampaignConversionGoals($request);
        print("PartialErrors:\r\n");
        print_r($response->getPartialErrors());
        self::assertEmpty($response->getPartialErrors());
    }
}