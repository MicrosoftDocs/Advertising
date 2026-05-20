<?php

use Microsoft\MsAds\Rest\ApiException;
use Microsoft\MsAds\Rest\Model\CustomerManagementService\ClientLink;
use Microsoft\MsAds\Rest\Model\CustomerManagementService\ClientLinkStatus;
use Microsoft\MsAds\Rest\Model\CustomerManagementService\AddClientLinksRequest;
use Microsoft\MsAds\Rest\Model\CustomerManagementService\UpdateClientLinksRequest;
use Microsoft\MsAds\Rest\Model\CustomerManagementService\SearchClientLinksRequest;
use Microsoft\MsAds\Rest\Model\CustomerManagementService\Paging;
use Microsoft\MsAds\Rest\Model\CustomerManagementService\Predicate;
use Microsoft\MsAds\Rest\Model\CustomerManagementService\PredicateOperator;
use Microsoft\MsAds\Rest\Model\CustomerManagementService\OrderBy;
use Microsoft\MsAds\Rest\Model\CustomerManagementService\OrderByField;
use Microsoft\MsAds\Rest\Model\CustomerManagementService\SortOrder;
use Microsoft\MsAds\Rest\Test\RestApiTestBase;

class ClientLinksTest extends RestApiTestBase
{

    // You must edit this example to provide the ClientAccountId for the client link.
    // When adding a client link, the client link's ManagingCustomerId is set to the CustomerId
    // of the current authenticated user, who must be a Super Admin of the agency.
    // Login as an agency Super Admin user to send a client link invitation, or unlink an existing client link.
    // Login as a client Super Admin user to accept a client link invitation.
    protected int $clientAccountId = 0; // Set this to a valid client account ID

    /**
     * @throws ApiException
     */
    public function testSearchClientLinks()
    {
        print("-----\r\nSearchClientLinks:\r\n");
        $paging = new Paging();
        $paging->setIndex(0);
        $paging->setSize(100);

        $predicate = new Predicate();
        $predicate->setField("ClientAccountId");
        $predicate->setOperator(PredicateOperator::IN);
        $predicate->setValue((string)$this->clientAccountId);

        $orderBy = new OrderBy();
        $orderBy->setField(OrderByField::NUMBER);
        $orderBy->setOrder(SortOrder::ASCENDING);

        $request = new SearchClientLinksRequest([
            'Predicates' => [$predicate],
            'Ordering' => [$orderBy],
            'PageInfo' => $paging
        ]);

        $response = self::$customerManagementServiceApi->searchClientLinks($request);
        $clientLinks = $response->getClientLinks();
        print("ClientLinks:\r\n");
        print_r($clientLinks);
        self::assertIsArray($clientLinks);
        return $clientLinks;
    }

    /**
     * @depends testSearchClientLinks
     * @throws ApiException
     */
    public function testAddClientLink($clientLinks)
    {
        $newLinkRequired = true;
        $existingLink = null;
        if (!empty($clientLinks)) {
            $existingLink = $clientLinks[0];
            if (in_array($existingLink->getStatus(), [
                ClientLinkStatus::ACTIVE,
                ClientLinkStatus::LINK_IN_PROGRESS,
                ClientLinkStatus::LINK_PENDING,
                ClientLinkStatus::UNLINK_IN_PROGRESS,
                ClientLinkStatus::UNLINK_PENDING,
                ClientLinkStatus::LINK_ACCEPTED
            ])) {
                $newLinkRequired = false;
            }
        }

        if ($newLinkRequired) {
            $clientLink = new ClientLink();
            $clientLink->setClientEntityId($this->clientAccountId);
            $clientLink->setManagingCustomerId(self::CUSTOMER_ID);
            $clientLink->setIsBillToClient(true);
            $clientLink->setName("My Client Link" . self::generateRandomAlphaNumeric());
            $clientLink->setStartDate(null);
            $clientLink->setSuppressNotification(false);

            print("-----\r\nAddClientLinks:\r\n");
            $request = new AddClientLinksRequest([
                'ClientLinks' => [$clientLink]
            ]);
            $response = self::$customerManagementServiceApi->addClientLinks($request);
            print("OperationErrors:\r\n");
            print_r($response->getOperationErrors());
            print("PartialErrors:\r\n");
            print_r($response->getPartialErrors());
            self::assertEmpty($response->getOperationErrors());
        } else {
            print("A new client link is not required.\r\n");
        }
    }

    /**
     * @depends testSearchClientLinks
     * @throws ApiException
     */
    public function testUpdateClientLink($clientLinks)
    {
        if (empty($clientLinks)) {
            self::markTestSkipped('No client links to update.');
        }
        $clientLink = $clientLinks[0];
        $status = $clientLink->getStatus();
        $update = false;
        if ($status === ClientLinkStatus::ACTIVE) {
            $clientLink->setStatus(ClientLinkStatus::UNLINK_REQUESTED);
            $update = true;
        } elseif ($status === ClientLinkStatus::LINK_PENDING) {
            $clientLink->setStatus(ClientLinkStatus::LINK_ACCEPTED);
            $update = true;
        }
        if ($update) {
            print("-----\r\nUpdateClientLinks:\r\n");
            $request = new UpdateClientLinksRequest([
                'ClientLinks' => [$clientLink]
            ]);
            $response = self::$customerManagementServiceApi->updateClientLinks($request);
            print("OperationErrors:\r\n");
            print_r($response->getOperationErrors());
            print("PartialErrors:\r\n");
            print_r($response->getPartialErrors());
            self::assertEmpty($response->getOperationErrors());
        } else {
            print("No update required for client link status: $status\r\n");
        }
    }
}

