<?php

namespace Tests\Resources;

use Dataleon\Client;
use Dataleon\Individuals\IndividualCreateParams;
use Dataleon\Individuals\IndividualCreateParams\Person;
use Dataleon\Individuals\IndividualCreateParams\TechnicalData;
use Dataleon\Individuals\IndividualListParams;
use Dataleon\Individuals\IndividualRetrieveParams;
use Dataleon\Individuals\IndividualUpdateParams;
use Dataleon\Individuals\IndividualUpdateParams\Person as Person1;
use Dataleon\Individuals\IndividualUpdateParams\TechnicalData as TechnicalData1;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class IndividualsTest extends TestCase
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

        $params = IndividualCreateParams::from(workspaceID: 'wk_123');
        $result = $this->client->individuals->create($params);

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $params = IndividualCreateParams::from(
            workspaceID: 'wk_123',
            person: (new Person)
                ->setBirthday('15/05/1985')
                ->setEmail('john.doe@example.com')
                ->setFirstName('John')
                ->setGender('M')
                ->setLastName('Doe')
                ->setMaidenName('John Doe')
                ->setPhoneNumber('+33 1 23 45 67 89'),
            sourceID: 'ID54410069066',
            technicalData: (new TechnicalData)
                ->setCallbackURL('https://example.com/callback')
                ->setCallbackURLNotification('https://example.com/notify')
                ->setLanguage('fra')
                ->setRawData(true),
        );
        $result = $this->client->individuals->create($params);

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $params = (new IndividualRetrieveParams);
        $result = $this->client->individuals->retrieve('individual_id', $params);

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $params = IndividualUpdateParams::from(workspaceID: 'wk_123');
        $result = $this->client->individuals->update('individual_id', $params);

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $params = IndividualUpdateParams::from(
            workspaceID: 'wk_123',
            person: (new Person1)
                ->setBirthday('15/05/1985')
                ->setEmail('john.doe@example.com')
                ->setFirstName('John')
                ->setGender('M')
                ->setLastName('Doe')
                ->setMaidenName('John Doe')
                ->setPhoneNumber('+33 1 23 45 67 89'),
            sourceID: 'ID54410069066',
            technicalData: (new TechnicalData1)
                ->setCallbackURL('https://example.com/callback')
                ->setCallbackURLNotification('https://example.com/notify')
                ->setLanguage('fra')
                ->setRawData(true),
        );
        $result = $this->client->individuals->update('individual_id', $params);

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $params = (new IndividualListParams);
        $result = $this->client->individuals->list($params);

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->individuals->delete('individual_id');

        $this->assertTrue(true); // @phpstan-ignore-line
    }
}
