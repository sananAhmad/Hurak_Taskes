<template>
    <div>
        <div style="display: flex" v-if="boxes">
            <div v-for="box in boxes">
                <div v-for="bb in box">
                    <div v-for="b in bb">
                        <!-- style="display: flex;"  -->
                        <div v-html="b"></div>
                    </div>
                </div>
            </div>
        </div>
        <div v-else></div>
    </div>
</template>

<script>
import { mapGetters } from "vuex";

export default {
    data() {
        return {
            boxes: "",
        };
    },
    mounted() {
        // this.$store.dispatch("fetchboxes");
        // console.log(this.$store.dispatch("fetchboxes"));
        setInterval(() => {
            axios
                .get("/api/boxes")
                .then((res) => {
                    console.log(res.data);
                    this.boxes = res.data;
                })
                .catch((err) => {
                    console.log(err);
                });
        }, 3000);
    },
    created() {},
    computed: {
        ...mapGetters(["this.boxes"]),
    },
};
</script>

<style scoped></style>
