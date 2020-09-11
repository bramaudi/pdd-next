<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class Install extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pdd:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install Aplikasi Portal Desa Digital';

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
     * @return int
     */
    public function handle()
    {
        $this->warn('Proses installasi akan menghapus isi database saat ini.');

        if ($this->confirm('Ingin melanjutkan?')) {
            $this->wipeDatabase();
            $this->createDatabase();
            $this->migrate();
            $this->seed();
            $this->setUpKey();
        }
    }

    /**
     * Buat Database
     */
    private function createDatabase()
    {
        if($this->testDbConnection()){
            return;
        }
 
        $this->line("Mohon pilih jenis database.");
 
        install_database:
 
        $connection = null;
        $host = null;
        $port = null;
        $database = null;
        $username = null;
        $password = null;
 
        $available_connections = array_keys(config('database.connections'));
        $connection = $this->choice('Pilih jenis database', $available_connections);
 
        if($connection == "sqlite"){
            $path = database_path('database.sqlite');
            touch($path);
            $this->info('File Database telah dibuat: ' . $path);
        } else{
            $defaultPort = $connection == "mysql" ? 3306 
                               : ($connection == "pgsql" ? 5432 : null);
 
            $host = $this->ask('Host Database', 'localhost');
            $port = $this->ask('Port Database', $defaultPort);
            $database = $this->ask('Nama Database');
            $username = $this->ask('User Database');
            $password = $this->secret('Sandi Database');
        }
 
        $settings = compact('connection', 'host', 'port', 'database', 'username', 'password');
        $this->updateEnvironmentFile($settings);
 
        if(!$this->testDbConnection()){
            $this->error('Gagal menghubungkan database.');
            goto install_database;
        }
    }

    /**
     * Test koneksi database
     */
    private function testDbConnection(){
        $this->line('Memeriksa Koneksi Database...');
 
        try {
            DB::connection(DB::getDefaultConnection());
        } catch(\Exception $e) {
            return false;
        }
 
        $this->info('Mantap! Database berhasil tersambung.');
        return true;
    }

    /**
     * Update .env
     */
    private function updateEnvironmentFile($settings)
    {
        $env_path = base_path('.env');
        DB::purge(DB::getDefaultConnection());
 
        foreach($settings as $key => $value){
            $key = 'DB_' . strtoupper($key);
            $line = $value ? ($key . '=' . $value) : $key;
            putenv($line);
            file_put_contents($env_path, preg_replace(
                '/^' . $key . '.*/m',
                $line,
                file_get_contents($env_path)
            ));
        }
 
        config()->offsetSet("database", include(config_path('database.php')));
 
    }

    /**
     * Kosongkan Database.
     * 
     * @return void
     */
    private function wipeDatabase()
    {
        $this->warn("\nMenghapus Database saat ini...");
        $this->call('db:wipe');
    }

    /** 
     * Jalankan Migrate.
     * 
     * @return void 
    */
    private function migrate(){
        $this->line("\nMemulai Proses Migrate...");
        $this->call('migrate');
    }
 
    /** 
     * Jalankan Seeds.
     * 
     * @return void 
    */
    private function seed(){
        $this->line("\nMemulai Proses Seeding...");
        $this->call('db:seed');
    }
 
    /** 
     * Hasilkan key.
     * 
     * @return void 
    */
    private function setUpKey(){
        $this->call('key:generate');
        $this->info("\nAplikasi berhasil diinstal!");
    }
}
