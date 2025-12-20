<?php

namespace App\Jobs;

use App\Models\Beer;
use App\Models\BeerEmbedding;
use App\Services\EmbeddingService;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;
use Pest\Mutate\Options\ExceptOption;
use Prism\Prism\Enums\Provider;
use Prism\Prism\Facades\Prism;

class ProcessBeerJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(protected Beer $beer)
    {}

    /**
     * Execute the job.
     */
    public function handle(EmbeddingService $embeddingService): void
    {
        try{
            $response = Prism::text()
                ->using(Provider::Gemini, 'gemini-2.5-flash')
                ->withSystemPrompt(view('prompts.brewer-tips-agent'))
                ->withPrompt($this->beer->toJson())
                ->withClientOptions(['timeout' => 9999])
                ->asText();

            $embedding = $embeddingService->generateEmbedding($response->text);

            BeerEmbedding::create([
                'beer_id' => $this->beer->id,
                'text' => $response->text,
                'metadata' => $this->beer->toArray(),
                'embedding' => $embedding->embeddings[0]->embedding,
            ]);
        } catch(Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
