
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app',
    data: {
        tweet: {
            body: '',
        },
        tweets: [],
        limit: 20
    },
    methods: {
        postTweet: function(e) {
            e.preventDefault();

            $.ajax({
                url: '/tweets',
                type: 'post',
                dataType: 'json',
                data: {
                    'body': this.tweet.body
                }
            }).done(function(data) {
                this.tweet.body = '';
                this.tweets.unshift(data);
            }.bind(this));
        },

        getTweets: function() {
            $.ajax({
                url: '/tweets',
                dataType: 'json',
                type: 'get',
                data: {
                    limit: this.limit
                }
            }).done(function(data){
                this.tweets = data.tweets;
            }.bind(this));
        }
    },
    mounted: function() {
        this.getTweets();

        setInterval(function() {
            this.getTweets();
        }.bind(this), 10000);
    }
});
