// Use global axios from CDN
if (window.axios) {
    window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
}

