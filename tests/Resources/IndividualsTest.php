<?php

namespace Tests\Resources;

use Dataleon\Client;
use Dataleon\Parameters\IndividualCreateParam;
use Dataleon\Parameters\IndividualCreateParam\Person;
use Dataleon\Parameters\IndividualCreateParam\TechnicalData;
use Dataleon\Parameters\IndividualListParam;
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
            $this->markTestSkipped('skipped: tests are disabled for the time being');
        }

        $result = $this
            ->client
            ->individuals
            ->create(IndividualCreateParam::new(workspaceID: 'wk_123'))
        ;

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('skipped: tests are disabled for the time being');
        }

        $result = $this
            ->client
            ->individuals
            ->create(
                IndividualCreateParam::new(
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
                        ->setLanguage('fra'),
                )
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('skipped: tests are disabled for the time being');
        }

        $result = $this->client->individuals->list(new IndividualListParam);

        $this->assertTrue(true); // @phpstan-ignore-line
    }
}
