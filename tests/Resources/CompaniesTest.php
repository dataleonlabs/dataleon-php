<?php

namespace Tests\Resources;

use Dataleon\Client;
use Dataleon\Models\CompanyCreateParams;
use Dataleon\Models\CompanyCreateParams\Company;
use Dataleon\Models\CompanyCreateParams\TechnicalData;
use Dataleon\Models\CompanyListParams;
use Dataleon\Models\CompanyRetrieveParams;
use Dataleon\Models\CompanyUpdateParams;
use Dataleon\Models\CompanyUpdateParams\Company as Company1;
use Dataleon\Models\CompanyUpdateParams\TechnicalData as TechnicalData1;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class CompaniesTest extends TestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $testUrl = getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(apiKey: 'My API Key', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testCreate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->companies
            ->create(
                CompanyCreateParams::new(
                    company: Company::new(name: 'ACME Corp'),
                    workspaceID: 'wk_123'
                )
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->companies
            ->create(
                CompanyCreateParams::new(
                    company: Company::new(name: 'ACME Corp')
                        ->setAddress('123 rue Exemple, Paris')
                        ->setCommercialName('ACME')
                        ->setCountry('FR')
                        ->setEmail('info@acme.fr')
                        ->setEmployerIdentificationNumber('EIN123456')
                        ->setLegalForm('SARL')
                        ->setPhoneNumber('+33 1 23 45 67 89')
                        ->setRegistrationDate('2010-05-15')
                        ->setRegistrationID('RCS123456')
                        ->setShareCapital('100000')
                        ->setStatus('active')
                        ->setTaxIdentificationNumber('FR123456789')
                        ->setType('main')
                        ->setWebsiteURL('https://acme.fr'),
                    workspaceID: 'wk_123',
                    sourceID: 'ID54410069066',
                    technicalData: (new TechnicalData)
                        ->setCallbackURL('https://example.com/callback')
                        ->setCallbackURLNotification('https://example.com/notify')
                        ->setLanguage('fra')
                        ->setRawData(true),
                )
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->companies
            ->retrieve('company_id', new CompanyRetrieveParams)
        ;

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->companies
            ->update(
                'company_id',
                CompanyUpdateParams::new(
                    company: Company1::new(name: 'ACME Corp'),
                    workspaceID: 'wk_123'
                )
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->companies
            ->update(
                'company_id',
                CompanyUpdateParams::new(
                    company: Company1::new(name: 'ACME Corp')
                        ->setAddress('123 rue Exemple, Paris')
                        ->setCommercialName('ACME')
                        ->setCountry('FR')
                        ->setEmail('info@acme.fr')
                        ->setEmployerIdentificationNumber('EIN123456')
                        ->setLegalForm('SARL')
                        ->setPhoneNumber('+33 1 23 45 67 89')
                        ->setRegistrationDate('2010-05-15')
                        ->setRegistrationID('RCS123456')
                        ->setShareCapital('100000')
                        ->setStatus('active')
                        ->setTaxIdentificationNumber('FR123456789')
                        ->setType('main')
                        ->setWebsiteURL('https://acme.fr'),
                    workspaceID: 'wk_123',
                    sourceID: 'ID54410069066',
                    technicalData: (new TechnicalData1)
                        ->setCallbackURL('https://example.com/callback')
                        ->setCallbackURLNotification('https://example.com/notify')
                        ->setLanguage('fra')
                        ->setRawData(true),
                )
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->companies->list(new CompanyListParams);

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->companies->delete('company_id');

        $this->assertTrue(true); // @phpstan-ignore-line
    }
}
