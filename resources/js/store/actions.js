let actions = {
    fetchboxes({ commit }) {
        axios
            .get("/api/boxes")
            .then((res) => {
                commit("FETCH_BOXES", res.data);
            })
            .catch((err) => {
                console.log(err);
            });
    },
};

export default actions;
