<?php
declare(strict_types=1);

namespace App\Tests\Functional\Controller;

use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HealthCheckActionTest extends WebTestCase
{

    public function test_request_responded_successfully_result(): void
    {
        $client = static::createClient();

        $client->request('GET', '/health-check', []);

        $this->assertResponseIsSuccessful();
        $jsonResult = json_decode($client->getResponse()->getContent(), true);
        $this->assertEquals('ok', $jsonResult['status']);
    }

}
