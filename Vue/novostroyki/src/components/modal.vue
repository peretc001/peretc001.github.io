<template>
    <transition name="modal">
        <div class="modal-mask" @click="$emit('close')">
            <div class="modal-wrapper">
                <div class="modal-container">
                    <button class="modal-default-button close" @click="$emit('close')">
                        X
                    </button>
                    <div class="modal-body">
                        <slot name="body">
                            <p><img class="warning" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHg9IjBweCIgeT0iMHB4IiB2aWV3Qm94PSIwIDAgNTIgNTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUyIDUyOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjUxMiIgaGVpZ2h0PSI1MTIiPjxnPjxnPgoJPHBhdGggZD0iTTI2LDBDMTEuNjY0LDAsMCwxMS42NjMsMCwyNnMxMS42NjQsMjYsMjYsMjZzMjYtMTEuNjYzLDI2LTI2UzQwLjMzNiwwLDI2LDB6IE0yNiw1MEMxMi43NjcsNTAsMiwzOS4yMzMsMiwyNiAgIFMxMi43NjcsMiwyNiwyczI0LDEwLjc2NywyNCwyNFMzOS4yMzMsNTAsMjYsNTB6IiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBjbGFzcz0iYWN0aXZlLXBhdGgiIGRhdGEtb2xkX2NvbG9yPSIjMDAwMDAwIiBzdHlsZT0iZmlsbDojODI4MjgyIj48L3BhdGg+Cgk8cGF0aCBkPSJNMjYsMTBjLTAuNTUyLDAtMSwwLjQ0Ny0xLDF2MjJjMCwwLjU1MywwLjQ0OCwxLDEsMXMxLTAuNDQ3LDEtMVYxMUMyNywxMC40NDcsMjYuNTUyLDEwLDI2LDEweiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIiBkYXRhLW9sZF9jb2xvcj0iIzAwMDAwMCIgc3R5bGU9ImZpbGw6IzgyODI4MiI+PC9wYXRoPgoJPHBhdGggZD0iTTI2LDM3Yy0wLjU1MiwwLTEsMC40NDctMSwxdjJjMCwwLjU1MywwLjQ0OCwxLDEsMXMxLTAuNDQ3LDEtMXYtMkMyNywzNy40NDcsMjYuNTUyLDM3LDI2LDM3eiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIiBkYXRhLW9sZF9jb2xvcj0iIzAwMDAwMCIgc3R5bGU9ImZpbGw6IzgyODI4MiI+PC9wYXRoPgo8L2c+PC9nPiA8L3N2Zz4=" /></p>
                           {{text}}
                        </slot>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
	export default {
		name: "Modal",
        props:['text'],
        created() {
            setTimeout(()=>{ this.$emit('close');},2500);
        }
    }
</script>

<style scoped>
    .modal-mask {
        position: fixed;
        z-index: 9998;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, .5);
        display: table;
        transition: opacity .3s ease;
    }

    .modal-wrapper {
        display: table-cell;
        vertical-align: middle;
    }

    .modal-container {
        width: 320px;
        margin: 0 auto;
        padding: 0;
        position: relative;
        background-color: #fff;
        border-radius: 2px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
        transition: all .3s ease;
        font-family: Helvetica, Arial, sans-serif;
    }

    .modal-header h3 {
        margin-top: 0;
        color: #42b983;
    }

    .modal-body {
        margin: 20px 0;
        padding: 20px 30px;
        text-align: center;
        color: #828282;
    }
    .modal-body .warning {
        width: 40px;
        height: auto;
        margin: 0 auto;
    }

    .modal-enter .modal-container,
    .modal-leave-active .modal-container {
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
    }
    .close {
        position: absolute;
        right: 0;
        top: 0;
        background: unset;
        border: 0;
        cursor: pointer;
        background: #828282;
        color: #ffffff;
        padding: 5px;
        border-radius: 0 2px 0 2px
    }
</style>
