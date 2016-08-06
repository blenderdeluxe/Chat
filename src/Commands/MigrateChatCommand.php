<?php

namespace Socieboy\Chat\Commands;

use Illuminate\Console\Command;

class MigrateChatCommand extends Command
{

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'chat:tables';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create a chat migrations';

	/**
	 * Execute the console command.
	 * @return mixed
	 */
	public function fire()
	{

        $this->createMigration('messages');

        $this->createMigration('sessions');

        $this->info('Migrations created successfully!');

        $this->laravel['composer']->dumpAutoloads();
	}

    /**
     * Create a base migration file for the reminders.
     *
     * @param $table
     * @return string
     */
    protected function createMigration($table)
    {
        $name = 'create_'.$table.'_table';

        $path = $this->laravel['path.database'].'/migrations';

        $migration = $this->laravel['migration.creator']->create($name, $path);

        file_put_contents($migration, $this->getMigrationStub($table));
    }

    /**
     * Get the contents of the reminder migration stub.
     *
     * @param $stub
     * @return string
     * @throws \Exception
     */
    protected function getMigrationStub($stub)
    {
        if(file_exists(__DIR__.'/../Stubs/'.$stub.'.stub'))
        {
            return  file_get_contents( __DIR__.'/../Stubs/'.$stub.'.stub');
        }
        throw new \Exception('We could not create the migration!');
    }

}
