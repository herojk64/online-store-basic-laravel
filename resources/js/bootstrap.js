
import { createPopper } from '@popperjs/core'; // Named import
import 'bootstrap'; // Import Bootstrap JavaScript
import 'bootstrap/dist/css/bootstrap.min.css'; // Import Bootstrap CSS

import axios from 'axios'; // Import Axios
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import Alpine from 'alpinejs'

window.Alpine = Alpine

Alpine.start()


