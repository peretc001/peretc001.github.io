<template>
    <div class="form__button">
        <div v-if="step === 1">
            <button class="stepStart" type="button" @click="go">Начать подбор</button>
        </div>

        <div v-if="step > 1 && step < 9">
            <button class="btn stepDel" type="button" @click="step2Del"> Назад</button>
            <button class="btn stepAdd" type="button" @click="step2Add">Далее</button>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Buttons",
        props: {step: {type: Number},showModal:{type: Boolean}},
        methods: {
            go() {
                this.$router.push('/SecondStep');
            },
            step2Add() {
	            let currentState = {};
	            if (this.$router.currentRoute.name !=='NinthStep'){
		            currentState = Object.values(this.$store.state.form[this.$router.currentRoute.name]);
                    currentState = currentState.filter((val) => {
                        return val !== false
                    });
                }
                
                if(currentState.length > 0 || this.$router.currentRoute.name === 'NinthStep') {
                  let curretStep = this.step + 1;

                  switch (curretStep) {
                      case 1 :
                          this.$router.push('/');
                          break;
                      case 2 :
                          this.$router.push({path: '/SecondStep'});
                          break;
                      case 3 :
                          this.$router.push({path: '/ThirdStep'});
                          break;
                      case 4 :
                          this.$router.push({path: '/FourthStep'});
                          break;
                      case 5 :
                          this.$router.push({path: '/FifthStep'});
                          break;
                      case 6 :
                          this.$router.push({path: '/SixthStep'});
                          break;
                      case 7 :
                          this.$router.push({path: '/SeventhStep'});
                          break;
                      case 8 :
                          this.$router.push({path: '/EighthStep'});
                          break;
                      case 9 :
                          this.$router.push({path: '/NinthStep'});
                          break;
                      case 10 :
                          this.$router.push({path: '/TenthStep'});
                          break;
                  }
              }else {
                 this.$emit('showModalEdit', true);
              }
            },
            step2Del() {
                let curretStep = this.step -1;

                switch (curretStep) {
                    case 1 : this.$router.push('/');
                        break;
                    case 2 : this.$router.push({path:'/SecondStep'});
                        break;
                    case 3 : this.$router.push({path:'/ThirdStep'});
                        break;
                    case 4 : this.$router.push({path:'/FourthStep'});
                        break;
                    case 5 : this.$router.push({path:'/FifthStep'});
                        break;
                    case 6 : this.$router.push({path:'/SixthStep'});
                        break;
                    case 7 : this.$router.push({path:'/SeventhStep'});
                        break;
                    case 8 : this.$router.push({path:'/EighthStep'});
                        break;
                    case 9 : this.$router.push({path:'/NinthStep'});
                        break;
                    case 10 : this.$router.push({path:'/TenthStep'});
                        break;
                }
            },
        }
    }
</script>

<style scoped>
    .stepStart {
        background: #4DBA4B;
        width: 180px;
        height: 40px;
        cursor: pointer;
        border: 0;
        font-size: 18px;
        color: #fff;
    }

    .stepStart:focus {
        outline: 0;
    }

    .btn {
        width: 100px;
        height: 45px;
        color: #fff;
        cursor: pointer;
        font-size: 18px;
        border: 0;
    }

    .stepAdd {
        background: #4DBA4B;
        margin-left: 20px;
    }

    .stepDel {
        border: 1px solid #000000;
        background: black;
    }

    .btn:focus {
        outline: 0;
    }

    @media only screen and (max-width: 812px) {

        .stepStart {
            font-size: 14px;
        }

        .btn {
            font-size: 14px;
        }

    }
</style>
