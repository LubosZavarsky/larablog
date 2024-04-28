<template>
    <div class="flash-msg" v-show="visible" @click="hide">
        {{ text }}
    </div>
</template>

<script>
export default {
    props: ["text"],

    data() {
        return {
            visible: false,
        };
    },

    created() {
        if (this.text) {
            this.show();
        }
    },

    methods: {
        show() {
            this.visible = true;

            setTimeout(() => this.hide(), 3000);
        },

        hide() {
            this.visible = false;
        },
    },
};
</script>

<style scoped>
.flash-msg {
    position: fixed;
    right: 1rem;
    bottom: 1rem;
    background: rgb(11, 148, 11);
    padding: 1rem;
    color: whitesmoke;
    font-weight: bold;
    border-radius: 5px;
    cursor: pointer;
}
</style>
