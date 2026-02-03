<?php

namespace Tests\Services;

use Dataleon\Client;
use Dataleon\Core\Util;
use Dataleon\Individuals\Individual;
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

        $testUrl = Util::getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(apiKey: 'My API Key', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testCreate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->individuals->create(workspaceID: 'wk_123');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Individual::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->individuals->create(
            workspaceID: 'wk_123',
            person: [
                'birthday' => '15/05/1985',
                'email' => 'john.doe@example.com',
                'firstName' => 'John',
                'gender' => 'M',
                'lastName' => 'Doe',
                'maidenName' => 'John Doe',
                'nationality' => 'FRA',
                'phoneNumber' => '+33 1 23 45 67 89',
            ],
            sourceID: 'ID54410069066',
            technicalData: [
                'activeAmlSuspicions' => false,
                'callbackURL' => 'https://example.com/callback',
                'callbackURLNotification' => 'https://example.com/notify',
                'filteringScoreAmlSuspicions' => 0.75,
                'language' => 'fra',
                'portalSteps' => ['identity_verification', 'selfie', 'face_match'],
                'rawData' => true,
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Individual::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->individuals->retrieve('individual_id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Individual::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->individuals->update(
            'individual_id',
            workspaceID: 'wk_123'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Individual::class, $result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->individuals->update(
            'individual_id',
            workspaceID: 'wk_123',
            person: [
                'birthday' => '15/05/1985',
                'email' => 'john.doe@example.com',
                'firstName' => 'John',
                'gender' => 'M',
                'lastName' => 'Doe',
                'maidenName' => 'John Doe',
                'nationality' => 'FRA',
                'phoneNumber' => '+33 1 23 45 67 89',
            ],
            sourceID: 'ID54410069066',
            technicalData: [
                'activeAmlSuspicions' => false,
                'callbackURL' => 'https://example.com/callback',
                'callbackURLNotification' => 'https://example.com/notify',
                'filteringScoreAmlSuspicions' => 0.75,
                'language' => 'fra',
                'portalSteps' => ['identity_verification', 'selfie', 'face_match'],
                'rawData' => true,
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Individual::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->individuals->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsList($result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->individuals->delete('individual_id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }
}
