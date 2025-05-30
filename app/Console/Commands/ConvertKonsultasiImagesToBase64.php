<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Konsultasi;
use Illuminate\Support\Facades\Storage;

class ConvertKonsultasiImagesToBase64 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'konsultasi:convert-images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Convert existing konsultasi images to Base64 format';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting conversion of konsultasi images to Base64...');
        
        $konsultasis = Konsultasi::whereNotNull('foto')
            ->whereNull('foto_base64')
            ->get();
        
        $total = $konsultasis->count();
        $this->info("Found {$total} images to convert.");
        
        if ($total === 0) {
            $this->info('No images to convert.');
            return 0;
        }
        
        $bar = $this->output->createProgressBar($total);
        $bar->start();
        
        $success = 0;
        $failed = 0;
        
        foreach ($konsultasis as $konsultasi) {
            $path = $konsultasi->foto;
            
            if (Storage::disk('public')->exists($path)) {
                try {
                    $fullPath = Storage::disk('public')->path($path);
                    $imageData = base64_encode(file_get_contents($fullPath));
                    $mimeType = mime_content_type($fullPath) ?: 'image/jpeg';
                    
                    $konsultasi->foto_base64 = "data:{$mimeType};base64,{$imageData}";
                    $konsultasi->save();
                    
                    $success++;
                } catch (\Exception $e) {
                    $this->error("Error converting image ID {$konsultasi->id}: {$e->getMessage()}");
                    $failed++;
                }
            } else {
                $this->warn("File not found for konsultasi ID {$konsultasi->id}: {$path}");
                $failed++;
            }
            
            $bar->advance();
        }
        
        $bar->finish();
        $this->newLine(2);
        
        $this->info("Conversion completed!");
        $this->info("Successfully converted: {$success}");
        $this->info("Failed conversions: {$failed}");
        
        return 0;
    }
}
