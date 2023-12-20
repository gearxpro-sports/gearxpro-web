<?php

namespace App\Console\Commands;

use App\Models\Attribute;
use App\Models\Term;
use DeepL\Translator;
use Illuminate\Console\Command;
use function Laravel\Prompts\confirm;
use function Laravel\Prompts\text;
use function Laravel\Prompts\select;

class AddNewTermToAttribute extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gearxpro:add-term';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command add a new term to an attribute';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $translator = new Translator(env('DEEPL_API_KEY'));
        $defaultLang = 'it';
        $langs = config('gearxpro.languages');

        $attributes = Attribute::all()->pluck('name', 'id');
        $attribute = select(
            label: 'A quale attributo vuoi aggiungere il nuovo termine?',
            options: $attributes,
        );
        $name = text(
            label: 'Qual è il nome del nuovo termine?',
            required: true
        );
        $existing_term = Term::where('attribute_id', $attribute)->where("value->$defaultLang", $name)->exists();
        if ($existing_term) {
            $this->error("Il termine '$name' associato all'attributo '$attributes[$attribute]' è già esistente.");
            exit;
        }

        $color = '';
        if ($attribute === 2) {
            $m_options = ['single', 'multicolor'];
            $multicolor = select(
                label: 'È un colore singolo o multicolor?',
                options: $m_options,
            );

            if ($multicolor === 'single') {
                $color = text(
                    label: 'Qual è il suo codice esacedimale?',
                    placeholder: 'E.g. #FF0000'
                );
            } elseif($multicolor === 'multicolor') {
                $color1 = text(
                    label: 'Qual è il codice esacedimale del primo colore?',
                    placeholder: 'E.g. #FF0000'
                );
                $color2 = text(
                    label: 'Qual è il codice esacedimale del secondo colore?',
                    placeholder: 'E.g. #FF0000'
                );
                $color = "$color1,$color2";
            }
        }

        $translation = confirm(
            label: 'Vuoi tradurre questo termine?',
            default: 'No',
            yes: 'Si',
            no: 'No',
        );

        if($translation) {
            $values = [];
            foreach ($langs as $iso => $dataLang) {
                $values[$iso] = $translator->translateText($name, $defaultLang, $dataLang['trans_code'])->text;
            }
        } else {
            $values[$defaultLang] = $name;
        }

        $last_position = Term::where('attribute_id', $attribute)->orderBy('position', 'desc')->first()->position;
        Term::create([
            'attribute_id' => $attribute,
            'value' => $values,
            'color' => $color !== '' ? $color : null,
            'position' => $last_position + 1
        ]);

        $this->info("Il termine '$name' è stato creato, tradotto e associato correttamente all'attributo '$attributes[$attribute]'");
    }
}
