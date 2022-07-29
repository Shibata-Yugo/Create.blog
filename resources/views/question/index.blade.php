<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div id="app" class="p-5">

    <div class="row" v-if="isStatusQuestion">
        <div class="col">
            <h3 class="mb-3" v-text="question.title"></h3>
            <div class="d-grid" v-for="item in question.items">
                <button
                    type="button"
                    class="btn btn-outline-info rounded-pill mb-2"
                    v-text="item.option"
                    @click="poll(item.id)"></button>
            </div>
        </div>
        <div class="col"></div>
        <div class="col"></div>
    </div>

    <div class="row" v-if="isStatusResult">
        <div class="col">
            <h3 class="mb-3" v-text="question.title"></h3>
            <div v-for="result in questionResults">
                <v-question-result
                    :option="result.option"
                    :percentage="result.percentage"></v-question-result>
                <br>
            </div>
        </div>
        
        <div class="col"></div>
        <div class="col"></div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/vue@3.1.1/dist/vue.global.prod.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script>

 const questionResultComponent = {
        props: {
            option: {
                type: String,
                default: ''
            },
            percentage: {
                type: Number,
                default: 0
            }
        },
        computed: {
            barStyles() {

                return {
                    backgroundColor: '#b2e9f8',
                    width: `${this.percentage}%`
                };

            }
        },
        template: `
            <div class="position-relative py-1">
                <div class="position-absolute" :style="barStyles">&#8203;</div>
                <div class="position-absolute ps-1" v-text="option"></div>
                <div class="position-absolute" style="right:0;">
                    <span v-text="percentage"></span> %
                </div>
            </div>
        `
    };

    Vue.createApp({
        data(){
            return {
                status: 'question', // `question` or `result`
                question: @json($question),
                isPolled: @json($is_polled),
                questionResults: {}
            }
        },
        methods: {
            poll(questionItemId) {

                const url = '{{ route('question.store') }}';
                const params = {
                    question_id: this.question.id,
                    question_item_id: questionItemId
                };

                axios.post(url, params)
                    .then(response => {

                        if(response.data.result === true) {

                            this.getResult();

                        }

                    })
                    .catch(error => {

                        alert('バリデーション・エラー');
                        console.log(errors.response.data);

                        // TODO: ここでエラー処理

                    });

            },
            getResult() {

                const url = '{{ route('question.result') }}/'+ this.question.id;

                axios.get(url)
                    .then(response => {

                        this.status = 'result'; // 表示を切り替え
                        this.questionResults = response.data;

                    });

            }
        },
        computed: {
            isStatusQuestion(){

                return (this.status === 'question');

            },
            isStatusResult(){

                return (this.status === 'result');

            }
        },
        mounted() {
             if(this.isPolled === true) {
            this.getResult();
            }
         }
    })
    .component('v-question-result', questionResultComponent)
    .mount('#app');

</script>
</body>
</html>