<?php

use Microsoft\MsAds\Rest\ApiException;
use Microsoft\MsAds\Rest\Model\CustomerManagementService\AdvertiserAccount;
use Microsoft\MsAds\Rest\Model\CustomerManagementService\CurrencyCode;
use Microsoft\MsAds\Rest\Model\CustomerManagementService\GetUserRequest;
use Microsoft\MsAds\Rest\Model\CustomerManagementService\Industry;
use Microsoft\MsAds\Rest\Model\CustomerManagementService\LanguageType;
use Microsoft\MsAds\Rest\Model\CustomerManagementService\SignupCustomerRequest;
use Microsoft\MsAds\Rest\Model\CustomerManagementService\Customer;
use Microsoft\MsAds\Rest\Model\CustomerManagementService\TimeZoneType;
use Microsoft\MsAds\Rest\Model\CustomerManagementService\Address;
use Microsoft\MsAds\Rest\Test\RestApiTestBase;

class CustomerSignupTest extends RestApiTestBase
{
    /**
     * @throws ApiException
     */
    public function testGetUserAndRole()
    {
        print("-----\r\nGetUser:\r\n");
        $request = new GetUserRequest();
        $response = self::$customerManagementServiceApi->getUser($request);
        $user = $response->getUser();
        print("GetUserResponse:\r\n");
        print_r($response);
        self::assertNotNull($user);
        print("User:\r\n");
        print_r($user);
        self::assertNotNull($user->getCustomerId());

        print("Checking if user has aggregator role...\r\n");
        $roleIds = array_map(function($role) {
            return $role->getRoleId();
        }, $response->getCustomerRoles());
        print("User Roles: " . implode(", ", $roleIds) . "\r\n");
        if (!in_array(33, $roleIds)) {
            self::fail("Only a user with the aggregator role (33) can sign up new customers.");
        }
        print("User has aggregator role, proceeding with signup...\r\n");

        return $user->getCustomerId();
    }

    /**
     * @depends testGetUserAndRole
     * @throws ApiException
     */
    public function testSignupCustomer($customerId)
    {
        print("-----\r\nSignupCustomer:\r\n");
        $customer = new Customer();
        $customer->setName("Child Customer ".self::generateRandomAlphaNumeric());
        $customer->setIndustry(Industry::OTHER);
        $customer->setMarketCountry("US");
        $customer->setMarketLanguage(LanguageType::ENGLISH);

        $account = new AdvertiserAccount();
        // The location where your business is legally registered.
        // The business address is used to determine your tax requirements.
        $businessAddress = new Address();
        $businessAddress->setCity("Redmond");
        $businessAddress->setCountryCode("US");
        $businessAddress->setPostalCode("98052");
        $businessAddress->setStateOrProvince("WA");
        $businessAddress->setLine1("One Microsoft Way");
        $account->setBusinessAddress($businessAddress);

        // The type of currency that is used to settle the account.
        // The service uses the currency information for billing purposes.
        $account->setCurrencyCode(CurrencyCode::USD);
        // The name of the account.
        $account->setName("Child Account ".self::generateRandomAlphaNumeric());
        // The identifier of the customer that owns the account.
        $account->setParentCustomerId($customerId);

        // The TaxInformation is optional. If specified, The tax information must be valid
        // in the country that you specified in the BusinessAddress element. Without tax information
        // or exemption certificate, taxes might apply based on your business location.
        $account->setTaxInformation(null);
        // The default time-zone for campaigns in this account.
        $account->setTimeZone(TimeZoneType::PACIFIC_TIME_US_CANADA_TIJUANA);

        $request = new SignupCustomerRequest([
            'Customer' => $customer,
            'Account' => $account,
            'ParentCustomerId' => $customerId,
        ]);

        $response = self::$customerManagementServiceApi->signupCustomer($request);
        print("SignupCustomerResponse:\r\n");
        print_r($response);
        self::assertNotNull($response->getCustomerId());
        self::assertNotNull($response->getAccountId());
        self::assertNotNull($response->getAccountNumber());
        self::assertNotNull($response->getCustomerNumber());
        print("New Customer ID: " . $response->getCustomerId() . "\r\n");
        print("New Account ID: " . $response->getAccountId() . "\r\n");
        print("New Customer Number: " . $response->getCustomerNumber() . "\r\n");
        print("New Account Number: " . $response->getAccountNumber() . "\r\n");
    }
}

