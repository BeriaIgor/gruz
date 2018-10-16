<template>
    <div class="panel-search">
        <div class="search input-group mb-3">
            <input type="text" class="form-control" v-model="query" @input="search" :placeholder="placeholder" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" @click="search">Поиск</button>
            </div>
            <div class="tt-menu" :class="results.length === 0 ? 'hidden' : ''">
                <div class="tt-dataset tt-dataset-states">
                    <div v-for="result in results" class="tt-suggestion tt-selectable" @click="substitution(result)">
                        {{ result }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        name: 'PanelSearch',
        props: {
            placeholder: {
                type: String,
                default: 'Поиск...',
            },
        },
        data(){
            return {
                query: '',
                results: [],
                errors: []
            }
        },
        methods: {
            search(e) {
                this.results = [];
                if (this.query.length < 3) return;

                axios.get('/api/tips', {
                    params: {
                        search: this.query,
                    }
                })
                    .then(response => {
                        const data = response.data;
                        if(data.length != undefined && data.length > 0){
                            this.results = data;
                        }
                    })
                    .catch(error => {
                        if (typeof error.response.data === 'object') {
                            this.errors = _.flatten(_.toArray(error.response.data));
                        } else {
                            this.errors = ['Something went wrong. Please try again.'];
                        }
                    });
            },
            substitution(result) {
                this.results = [];
                this.query = result;
            }
        },
    }
</script>

<style>
    .input-group-append, .input-group-prepend {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        margin-left: -1px;
    }
    .panel-search .input-group > .input-group-append > .btn {
        border-radius: 4px;
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }
    .tt-menu {
        position: absolute;
        top: 100%;
        left: 0px;
        z-index: 100;
        width: 100%;
        margin: 12px 0;
        padding: 8px 0;
        background-color: #fff;
        border: 1px solid rgba(0, 0, 0, 0.2);
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
        -moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);
        box-shadow: 0 5px 10px rgba(0,0,0,.2);
    }
    .tt-suggestion {
        padding: 3px 20px;
        font-size: 18px;
        line-height: 24px;
    }
    .tt-suggestion:hover {
        cursor: pointer;
        color: #fff;
        background-color: #0097cf;
    }
</style>