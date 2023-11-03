import './bootstrap';

import {Livewire, Alpine} from '../../vendor/livewire/livewire/dist/livewire.esm';
import mask from '@alpinejs/mask'
import '@nextapps-be/livewire-sortablejs';
 
Alpine.plugin(mask)

Livewire.start();
