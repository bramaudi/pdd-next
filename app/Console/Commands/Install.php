<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class Install extends Command
{
    private $installed;
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
        $this->envExists = file_exists('.env');
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if (!$this->testDbConnection()) {
            $this->setupDatabase();
        }

        if (App::environment('local')) {
            $this->warn('Proses installasi akan membersihkan seluruh isi database saat ini.');

            if ($this->confirm('Yakin ingin melanjutkan?')) {
                $this->wipe();
                $this->migrate();
                $this->seed();
                $this->setUpKey();
            }
        }
    }

    /**
     * Buat Database
     */
    private function setupDatabase()
    {
        $this->info('Memulai menyiapkan koneksi database.');

        copy('.env.example', '.env');

        $dbHost = $this->anticipate('Masukan Host Database', ['localhost', '127.0.0.1']);
        $dbUser = $this->anticipate('Masukan User Database', ['root', 'mysql']);
        $dbPass = $this->ask('Masukan Password Database');

        $conn = new \mysqli($dbHost, $dbUser, $dbPass);
        if (!$conn->connect_errno) {

            $databaseName = $this->ask('Masukan Nama Database');
            $schemaName = $databaseName ?: config("database.connections.mysql.database");
            $charset = config("database.connections.mysql.charset",'utf8mb4');
            $collation = config("database.connections.mysql.collation",'utf8mb4_unicode_ci');
    
            config(["database.connections.mysql.database" => null]);
    
            $query = "CREATE DATABASE IF NOT EXISTS `$schemaName` CHARACTER SET `$charset` COLLATE `$collation`;";
    
            $conn->query($query);
    
            config(["database.connections.mysql.database" => $schemaName]);

            $this->info("\nMenyimpan konfigurasi database...");

            file_put_contents('.env', preg_replace(
                array(
                    '/DB_HOST=(.*+)?/i',
                    '/DB_USERNAME=(.*+)?/i',
                    '/DB_PASSWORD=(.*+)?/i',
                    '/DB_DATABASE=(.*+)?/i',
                ),
                array(
                    'DB_HOST='.$dbHost,
                    'DB_USERNAME='.$dbUser,
                    'DB_PASSWORD='.$dbPass,
                    'DB_DATABASE='.$schemaName,
                ),
                file_get_contents('.env')
            ));

            $this->info("Tersimpan!");
            $this->info("\nDatabase telah siap! Mohon jalankan installer sekali lagi.");

        }
    }

    /**
     * Test koneksi database
     */
    private function testDbConnection(){
        $this->line('Memeriksa Koneksi Database...');

        
        
        // Test database connection
    
        $database_host = config('database.connections.mysql.host');
        $database_name = config('database.connections.mysql.database');
        $database_user = config('database.connections.mysql.username');
        $database_password = config('database.connections.mysql.password');
        
        try {
            $conn = new \mysqli($database_host,$database_user,$database_password,$database_name);
            
            if (!$conn->connect_errno) {
                $this->info('Database berhasil tersambung.');
            }

            return true;
        } catch (\Exception $e) {
            $this->error('Gagal menyambungkan Database.');
            return false;
        }
    }
    
    /**
     * Kosongkan Database.
     * 
     * @return void
     */
    private function wipe()
    {
        $this->warn("\nMembersihkan database...");
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
        $this->info("Login Admin:");
        $this->line("==================");
        $this->line("| User: admin    |");
        $this->line("| Pass: password |");
        $this->line("==================");
    }
}
