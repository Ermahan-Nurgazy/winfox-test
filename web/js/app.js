var app = new Vue({
    el: "#app",
    data: {
        firstname: "",
        lastname: "",
        email: "",
        records: [],
        update_id: "",
        update_firstname: "",
        update_lastname: "",
        update_email: "",
    },
    computed: {
        getUsersLength() {
            return this.records ? this.records.length : 0;
        }
    },
    methods: {
        onSubmit() {
            if (this.firstname !== "" && this.lastname !== "" && this.email !== "") {
                var fd = new FormData();

                fd.append("firstname", this.firstname);
                fd.append("lastname", this.lastname);
                fd.append("email", this.email);

                axios({
                    url: "../crud/create.php",
                    method: "post",
                    data: fd,
                })
                    .then((res) => {
                        if (res.data.res == "success") {

                            this.firstname = "";
                            this.lastname = "";
                            this.email = "";

                            app.getUsers();
                        }
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            } else {
                alert("All field are required");
            }
        },
        getUsers() {
            axios({
                url: "../crud/read.php",
                method: "get",
            })
                .then((res) => {
                    this.records = res.data.rows;
                })
                .catch((err) => {
                    console.log(err);
                });
        },
        deleteUser(id) {
            if (window.confirm("Delete this user?")) {
                var fd = new FormData();

                fd.append("id", id);

                axios({
                    url: "../crud/delete.php",
                    method: "post",
                    data: fd,
                })
                    .then((res) => {
                        if (res.data.res == "success") {
                            app.getUsers();
                        }
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            }
        },
        editUser(id) {
            var fd = new FormData();

            fd.append("id", id);

            axios({
                url: "../crud/edit.php",
                method: "post",
                data: fd,
            })
                .then((res) => {
                    if (res.data.res == "success") {
                        this.update_id = res.data.row[0];
                        this.update_firstname = res.data.row[1];
                        this.update_lastname = res.data.row[2];
                        this.update_email = res.data.row[3];
                    }
                })
                .catch((err) => {
                    console.log(err);
                });
        },
        onUpdate() {
            if (
                this.update_firstname !== "" &&
                this.update_lastname !== "" &&
                this.update_email !== "" &&
                this.update_id !== ""
            ) {
                var fd = new FormData();

                fd.append("id", this.update_id);
                fd.append("firstname", this.update_firstname);
                fd.append("lastname", this.update_lastname);
                fd.append("email", this.update_email);

                axios({
                    url: "../crud/update.php",
                    method: "post",
                    data: fd,
                })
                    .then((res) => {
                        if (res.data.res == "success") {
                            this.update_firstname = "";
                            this.update_lastname = "";
                            this.update_email = "";
                            this.update_id = "";

                            app.getUsers();
                        }
                    })
                    .catch((err) => {
                        console.log(err)
                    });
            } else {
                alert("All field are required");
            }
        },
    },

    mounted: function () {
        this.getUsers();
    },
});