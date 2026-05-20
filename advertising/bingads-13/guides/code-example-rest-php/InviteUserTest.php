<?php

use Microsoft\MsAds\Rest\ApiException;
use Microsoft\MsAds\Rest\Model\CustomerManagementService\InviteUserRequest;
use Microsoft\MsAds\Rest\Model\CustomerManagementService\LCID;
use Microsoft\MsAds\Rest\Model\CustomerManagementService\Predicate;
use Microsoft\MsAds\Rest\Model\CustomerManagementService\PredicateOperator;
use Microsoft\MsAds\Rest\Model\CustomerManagementService\SearchUserInvitationsRequest;
use Microsoft\MsAds\Rest\Model\CustomerManagementService\SendUserInvitationRequest;
use Microsoft\MsAds\Rest\Model\CustomerManagementService\UserInvitation;
use Microsoft\MsAds\Rest\Test\RestApiTestBase;

class InviteUserTest extends RestApiTestBase
{
    // You must edit this example to provide the email address of the user you want to invite.
    private string $userInvitationEmail = "jayw.92@gmail.com"; // Set this to a valid email address
    /**
     * @throws ApiException
     */
    public function testInviteUser()
    {
        print("-----\r\nInviteUser:\r\n");
        $invitation = new UserInvitation();
        $invitation->setFirstName("FirstNameGoesHere");
        $invitation->setLastName("LastNameGoesHere");
        $invitation->setEmail($this->userInvitationEmail);
        $invitation->setCustomerId(self::CUSTOMER_ID);
        $invitation->setRoleId(16); // Set a valid role ID if required
        $invitation->setLcid(LCID::ENGLISH_US); // English

        $request = new SendUserInvitationRequest([
            'UserInvitation' => $invitation
        ]);

        $response = self::$customerManagementServiceApi->sendUserInvitation($request);
        print("InviteUserResponse:\r\n");
        print_r($response);
        self::assertNotNull($response);
        self::assertNotNull($response->getUserInvitationId());
        print("User invitation sent successfully to: " . $this->userInvitationEmail . "\r\n");
    }

    /**
     * @throws ApiException
     */
    public function testSearchUserInvitations()
    {
        print("-----\r\nSearchUserInvitations:\r\n");
        $predicates = [];
        $predicate = new Predicate();
        $predicate->setField("CustomerId");
        $predicate->setOperator(PredicateOperator::IN);
        $predicate->setValue(self::CUSTOMER_ID);
        $predicates[] = $predicate;

        $request = new SearchUserInvitationsRequest();
        $request->setPredicates($predicates);

        $response = self::$customerManagementServiceApi->searchUserInvitations($request);
        print("SearchUserInvitationsResponse:\r\n");
        print_r($response);
        self::assertNotNull($response);
        self::assertIsArray($response->getUserInvitations());
        print("Found " . count($response->getUserInvitations()) . " user invitations:\r\n");
        self::assertGreaterThan(0, count($response->getUserInvitations()));

        foreach ($response->getUserInvitations() as $invitation) {
            print("Found User Invitation:\r\n");
            print_r($invitation);
        }

    }
}

