<?php

namespace Tests\Resources;

use Dataleon\Client;
use Dataleon\Companies\CompanyCreateParams;
use Dataleon\Companies\CompanyCreateParams\Company;
use Dataleon\Companies\CompanyCreateParams\TechnicalData;
use Dataleon\Companies\CompanyListParams;
use Dataleon\Companies\CompanyRetrieveParams;
use Dataleon\Companies\CompanyUpdateParams;
use Dataleon\Companies\CompanyUpdateParams\Company as Company1;
use Dataleon\Companies\CompanyUpdateParams\TechnicalData as TechnicalData1;
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

        $params = CompanyCreateParams::with(
            company: Company::with(name: 'ACME Corp'),
            workspaceID: 'wk_123'
        );
        $result = $this->client->companies->create($params);

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $params = CompanyCreateParams::with(
            company: Company::with(name: 'ACME Corp')
                ->withAddress('123 rue Exemple, Paris')
                ->withCommercialName('ACME')
                ->withCountry('FR')
                ->withEmail('info@acme.fr')
                ->withEmployerIdentificationNumber('EIN123456')
                ->withLegalForm('SARL')
                ->withPhoneNumber('+33 1 23 45 67 89')
                ->withRegistrationDate('2010-05-15')
                ->withRegistrationID('RCS123456')
                ->withShareCapital('100000')
                ->withStatus('active')
                ->withTaxIdentificationNumber('FR123456789')
                ->withType('main')
                ->withWebsiteURL('https://acme.fr'),
            workspaceID: 'wk_123',
            sourceID: 'ID54410069066',
            technicalData: (new TechnicalData)
                ->withCallbackURL('https://example.com/callback')
                ->withCallbackURLNotification('https://example.com/notify')
                ->withLanguage('fra')
                ->withRawData(true),
        );
        $result = $this->client->companies->create($params);

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $params = (new CompanyRetrieveParams);
        $result = $this->client->companies->retrieve('company_id', $params);

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $params = CompanyUpdateParams::with(
            company: Company1::with(name: 'ACME Corp'),
            workspaceID: 'wk_123'
        );
        $result = $this->client->companies->update('company_id', $params);

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $params = CompanyUpdateParams::with(
            company: Company1::with(name: 'ACME Corp')
                ->withAddress('123 rue Exemple, Paris')
                ->withCommercialName('ACME')
                ->withCountry('FR')
                ->withEmail('info@acme.fr')
                ->withEmployerIdentificationNumber('EIN123456')
                ->withLegalForm('SARL')
                ->withPhoneNumber('+33 1 23 45 67 89')
                ->withRegistrationDate('2010-05-15')
                ->withRegistrationID('RCS123456')
                ->withShareCapital('100000')
                ->withStatus('active')
                ->withTaxIdentificationNumber('FR123456789')
                ->withType('main')
                ->withWebsiteURL('https://acme.fr'),
            workspaceID: 'wk_123',
            sourceID: 'ID54410069066',
            technicalData: (new TechnicalData1)
                ->withCallbackURL('https://example.com/callback')
                ->withCallbackURLNotification('https://example.com/notify')
                ->withLanguage('fra')
                ->withRawData(true),
        );
        $result = $this->client->companies->update('company_id', $params);

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $params = (new CompanyListParams);
        $result = $this->client->companies->list($params);

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
