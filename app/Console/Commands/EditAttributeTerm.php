<?php

namespace App\Console\Commands;

use App\Models\Attribute;
use App\Models\Term;
use DeepL\Translator;
use Illuminate\Console\Command;
use function Laravel\Prompts\confirm;
use function Laravel\Prompts\search;
use function Laravel\Prompts\select;
use function Laravel\Prompts\text;

class EditAttributeTerm extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gearxpro:edit-term';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command edit a term';

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
            label: 'A quale attributo appartiene il termine che vuoi modificare?',
            options: $attributes,
        );

        $id = search(
            'Cerca il termine che vuoi modificare..',
            function (string $value) use ($attribute, $defaultLang) {
                if (strlen($value) > 0) {
                    return Term::where('attribute_id', $attribute)->where("value->$defaultLang", 'like', "%{$value}%")->pluck('value', 'id')->all();
                } else {
                    return [];
                }
            }
        );

        $term = Term::find($id);
        $name = text(
            label: 'Qual è il nuovo nome del termine?',
            default: $term->value,
            required: true,
        );
        $existing_term = Term::where('attribute_id', $attribute)->where("value->$defaultLang", $name)->exists();

        $color = '';
        if ($attribute === 2) {
            $m_options = ['single', 'multicolor'];
            $multicolor = select(
                label: 'È un colore singolo o multicolor?',
                options: $m_options,
            );
            $term_colors = explode(',', $term->color);
            if ($multicolor === 'single') {
                $color = text(
                    label: 'Qual è il suo codice esacedimale?',
                    placeholder: 'E.g. #FF0000'
                );
            } elseif ($multicolor === 'multicolor') {
                $color1 = text(
                    label: 'Qual è il codice esacedimale del primo colore?',
                    placeholder: 'E.g. #FF0000',
                    default: $term_colors[0] ?? ''
                );
                $color2 = text(
                    label: 'Qual è il codice esacedimale del secondo colore?',
                    placeholder: 'E.g. #FF0000',
                    default: $term_colors[1] ?? ''
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

        if ($translation) {
            $values = [];
            foreach ($langs as $iso => $dataLang) {
                $values[$iso] = $translator->translateText($name, $defaultLang, $dataLang['trans_code'])->text;
            }
        } else {
            $values[$defaultLang] = $name;
        }

        $term->update([
            'value' => $values,
            'color' => $color !== '' ? $color : null,
        ]);

        $this->info("Il termine '$name' è stato modificato correttamente");
    }
}
