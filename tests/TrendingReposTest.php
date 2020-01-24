<?php


class TrendingReposTest extends TestCase
{
    /**
     *
     * @return void
     */
    public function testResponse()
    {
        $this->json('GET', '/api/trending')
            ->seeJsonStructure ([
                'last_scan',
                'languages'
            ])
            ->seeStatusCode(200);
    }

}
