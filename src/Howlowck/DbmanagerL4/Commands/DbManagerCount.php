<?php namespace Howlowck\DbmanagerL4\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use \DB;
use \Schema;

class DbManagerCount extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'db:count';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Counts the rows of a given table';

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
	 * @return void
	 */
	public function fire()
	{
		$tablename = $this->argument('tablename');
		if ( ! Schema::hasTable($tablename)) {
			return $this->error("$tablename does not exist in database");
		}
		$table = DB::table($tablename);
		$count = $table->count();
		return $this->info("$tablename table has $count rows.");
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			array('tablename', InputArgument::REQUIRED, 'Table Name'),
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
			// array('example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null),
		);
	}

}