<?php

namespace App\Console\Commands;

use App\Models\Attribute;
use DeepL\Translator;
use Illuminate\Console\Command;

class TranslateAttributes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gearxpro:translate-attributes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command translate all attribute and related terms names';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $translator = new Translator(env('DEEPL_API_KEY'));
        $defaultLang = 'it';
        $langs = config('gearxpro.languages');

        // fix attribute name typo
        if ($attr = Attribute::where('name->'.$defaultLang, 'Lughezza')->first()) {
            $attr->setTranslation('name', $defaultLang, 'Lunghezza');
            $attr->save();
            $this->info('Fixed "Lughezza" attribute name typo');
        }

        $attributes = Attribute::all();

        foreach ($attributes as $attribute) {

            $attributeNames = [];
            foreach ($langs as $iso => $dataLang) {
                $attributeNames[$iso] = $translator->translateText($attribute->getTranslation('name', $defaultLang), $defaultLang, $dataLang['trans_code'])->text;
            }
            $attribute->name = $attributeNames;
            $attribute->save();

            foreach ($attribute->terms as $term) {
                $termValues = [];
                foreach ($langs as $iso => $dataLang) {
                    $termValues[$iso] = $translator->translateText($term->getTranslation('value', $defaultLang), $defaultLang, $dataLang['trans_code'])->text;
                }
                $term->value = $termValues;
                $term->save();
            }

            $this->info('Attribute "'.$attribute->getTranslation('name', $defaultLang). '" name and terms translations done');
        }
    }
}
