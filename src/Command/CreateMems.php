<?php

namespace App\Command;

use App\Entity\Mem;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateMems extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('link:fixture')
            ->setDescription('Create fixtures');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getContainer()->get('doctrine.orm.entity_manager');

        $fixtures = [
            [
                'name' => 'Meme1',
                'link' => 'http://25.media.tumblr.com/tumblr_m4puf1j9DI1r6jd7fo1_1280.jpg'
            ],
            [
                'name' => 'Meme2',
                'link' => 'http://24.media.tumblr.com/tumblr_lqhub4WImv1qbhms5o1_500.jpg'
            ],
            [
                'name' => 'Meme3',
                'link' => 'http://25.media.tumblr.com/tumblr_lvpkvlTJSa1r1w1eoo3_250.gif'
            ],
            [
                'name' => 'Meme4',
                'link' => 'http://25.media.tumblr.com/tumblr_ly506dTBHE1qzuix4o1_400.gif'
            ],
            [
                'name' => 'Meme5',
                'link' => 'http://25.media.tumblr.com/tumblr_m3kh8ln9fh1qjc1a7o1_1280.jpg'
            ],
        ];

        foreach($fixtures as $fixture) {
            $mem = new Mem();
            $mem->setName($fixture['name']);
            $mem->setLink($fixture['link']);
            $em->persist($mem);
            $em->flush();
        }
    }
}