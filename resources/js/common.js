export default {
    data(){
        return {

        }
    }, 
    methods: {
        async callApi(method, url, dataObj ){
            try {
              return await axios({
                    method: method,
                    url: url,
                    data: dataObj
                });
            } catch (e) {
                return e.response
            }
        }, 

        feedbackSuccess(header,html)
        {
            toast.fire({
                icon    : 'success',
                title   : header,
                html    : html
            })
        },

        feedbackWarning(header,html)
        {
            toast.fire({
                icon    : 'warning',
                title   : header,
                html    : html
            })
        },

        feedbackError(header,html)
        {
            toast.fire({
                icon    : 'error',
                title   : header,
                html    : html
            })
        },

        showErrors(message,errors)
        {
            let validation_errors   =   "";

            Object.keys(errors).forEach(element => {
                validation_errors   =   validation_errors   +   errors[element]
            });
            
            this.feedbackError(message   ,   validation_errors)
        }
    },   
}