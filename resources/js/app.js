import './bootstrap';

import {Livewire, Alpine} from '../../vendor/livewire/livewire/dist/livewire.esm';
import mask from '@alpinejs/mask'
import Tooltip from '@ryangjchandler/alpine-tooltip'
import '@nextapps-be/livewire-sortablejs';

Alpine.plugin(mask)
Alpine.plugin(Tooltip)

Livewire.start();
