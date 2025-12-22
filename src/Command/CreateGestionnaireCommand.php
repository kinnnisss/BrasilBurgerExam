<?php

namespace App\Command;

use App\Entity\Gestionnaire;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[AsCommand(
    name: 'app:create-gestionnaire',
    description: 'Crée un gestionnaire avec un mot de passe hashé et l’insère en base.'
)]
class CreateGestionnaireCommand extends Command
{
    public function __construct(
        private readonly EntityManagerInterface $em,
        private readonly UserPasswordHasherInterface $hasher
    ) {
        parent::__construct();
    }
    protected function configure(): void
    {
        $this
            ->addArgument('nom', InputArgument::REQUIRED)
            ->addArgument('prenom', InputArgument::REQUIRED)
            ->addArgument('login', InputArgument::REQUIRED)
            ->addArgument('password', InputArgument::REQUIRED);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $nom = (string) $input->getArgument('nom');
        $prenom = (string) $input->getArgument('prenom');
        $login = strtolower((string) $input->getArgument('login')); 
        $plainPassword = (string) $input->getArgument('password');

        
        $existing = $this->em->getRepository(Gestionnaire::class)->findOneBy(['login' => $login]);
        if ($existing) {
            $output->writeln('<error>Login déjà utilisé.</error>');
            return Command::FAILURE;
        }

        $g = new Gestionnaire();
        $g->setNom($nom)
          ->setPrenom($prenom)
          ->setLogin($login);

        $hashed = $this->hasher->hashPassword($g, $plainPassword);
        $g->setPassword($hashed);

        $this->em->persist($g);
        $this->em->flush();

        $output->writeln('<info>Gestionnaire créé </info>');
        $output->writeln("Login: $login");
        $output->writeln("Mot de passe initial (à noter maintenant): $plainPassword");

        return Command::SUCCESS;
    }

}
