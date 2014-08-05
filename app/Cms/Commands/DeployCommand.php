<?php namespace Cms\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class DeployCommand extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'cms:deploy';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a developer account and more.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        $this->setupDatabase();
        $this->createUser();
        $this->setupProject();
        $this->setupDefinitions();
    }

    public function setupDatabase() {
        $options = $this->option();

        $this->info('Creating the database');
        $this->call('migrate');
    }

    public function createUser() {
        $options = $this->option();

        $this->info('Creating the developer account');

        if (!$options['name']) {
            $options['name'] = $this->ask('What is your name?');
        }

        if (!$options['email']) {
            $options['email'] = $this->ask('What is your email?');
        }

        if (!$options['password']) {
            $p1 = ' ';
            $p2 = '';
            while ($p1 !== $p2) {
                $p1 = $this->secret('Type a password');
                $p2 = $this->secret('Repeat the password');

                if ($p1 !== $p2) {
                    $this->error('Passwords doesn\'t match, try again');
                }
            }
            
            $options['password'] = $p1;
        }
        
        $user = [
            'name' => $options['name'],
            'email' => $options['email'],
            'role' => 'dev',
        ];

        try {
            $model = new \User;
            $model->fill($user);
            $model->password = \Hash::make($options['password']);
            $model->isValid();
            $model->save();
        } catch (\Exception $e) {
            $this->error('Error creating developer user: "' . $e->getMessage() . '"');
        }
    }

    public function setupProject() {
        $options = $this->option();

        $this->info('Setting up project');

        if (!$options['project_name']) {
            $options['project_name'] = $this->ask('What is the project name?');
        }

        $definition = [
            'identifier' => 'project_name',
            'description' => 'The name of this project',
            'type' => 'string',
            'string' => $options['project_name'],
            'editable' => false,
        ];
        try {
            \DefinitionDriver::store($definition);
        } catch (\Exception $e) {
            $this->error('Error setting the project name: "' . $e->getMessage() . '"');
        }

        $view = [
            'name' => 'index',
            'content' => 'welcome',
        ];
        try {
            \PublicViewDriver::store($view);
        } catch (\Exception $e) {
            $this->error('Error creating the home view: "' . $e->getMessage() . '"');
        }

        $route = [
            'name' => 'index',
            'path' => '/',
            'function' => "return View::make('site.index');",
        ];
        try {
            \PublicRouteDriver::store($route);
        } catch (\Exception $e) {
            $this->error('Error creating the home route: "' . $e->getMessage() . '"');
        }
    }

    public function setupDefinitions() {
        $this->info('Setting up definitions');

        $definition = [
            'identifier' => 'email_from_email',
            'description' => '"From" email address',
            'type' => 'string',
            'string' => 'norepley@example.com',
            'editable' => false,
        ];
        try {
            \DefinitionDriver::store($definition);
        } catch (\Exception $e) {
            $this->error('Error creating the definition: "' . $e->getMessage() . '"');
        }

        $definition = [
            'identifier' => 'email_from_name',
            'description' => '"From" email address alias',
            'type' => 'string',
            'string' => 'CMS',
            'editable' => false,
        ];
        try {
            \DefinitionDriver::store($definition);
        } catch (\Exception $e) {
            $this->error('Error creating the definition: "' . $e->getMessage() . '"');
        }

        $definition = [
            'identifier' => 'mailgun_domain',
            'description' => 'Mailgun API domain',
            'type' => 'string',
            'string' => '',
            'editable' => false,
        ];
        try {
            \DefinitionDriver::store($definition);
        } catch (\Exception $e) {
            $this->error('Error creating the definition: "' . $e->getMessage() . '"');
        }

        $definition = [
            'identifier' => 'mailgun_secret',
            'description' => 'Mailgun API secret',
            'type' => 'string',
            'string' => '',
            'editable' => false,
        ];
        try {
            \DefinitionDriver::store($definition);
        } catch (\Exception $e) {
            $this->error('Error creating the definition: "' . $e->getMessage() . '"');
        }
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return array(
            
        );
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return array(
            array('name', null, InputOption::VALUE_REQUIRED, 'Developer name.', null),
            array('email', null, InputOption::VALUE_REQUIRED, 'Developer account email.', null),
            array('password', null, InputOption::VALUE_REQUIRED, 'Developer account password.', null),
            array('project_name', null, InputOption::VALUE_REQUIRED, 'Current project name.', null),
            array('db_name', null, InputOption::VALUE_REQUIRED, 'Database name.', null),
            array('db_username', null, InputOption::VALUE_REQUIRED, 'Database username.', null),
            array('db_password', null, InputOption::VALUE_REQUIRED, 'Database password.', null),
            array('db_host', null, InputOption::VALUE_REQUIRED, 'Database host.', null),
        );
    }

}
