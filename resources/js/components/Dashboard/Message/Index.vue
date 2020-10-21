<template>
    <div class="container mt-3">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Contact List</h3>
                                <div class="cart-total">
                                    <div class="btn btn-primary float-right">
                                        <router-link
                                            to="/create_contact"
                                            class="text-white"
                                            >New</router-link
                                        >
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div
                                    id="example2_wrapper"
                                    class="dataTables_wrapper dt-bootstrap4"
                                >
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6"></div>
                                        <div class="col-sm-12 col-md-6"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table
                                                id="example2"
                                                class="table table-bordered table-hover dataTable dtr-inline"
                                                role="grid"
                                                aria-describedby="example2_info"
                                            >
                                                <thead>
                                                    <tr role="row">
                                                        <th>Id</th>
                                                        <th>Name</th>
                                                        <th>Message</th>
                                                        <th>Created</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr
                                                        role="row"
                                                        class="even"
                                                        v-for="(contact,
                                                        index) in getAllContact"
                                                        :key="contact.id"
                                                    >
                                                        <td
                                                            class="sorting_1"
                                                            tabindex="0"
                                                        >
                                                            {{ index + 1 }}
                                                        </td>
                                                        <td>
                                                            {{ contact.name }}
                                                        </td>
                                                        <td>
                                                            {{ contact.description }}
                                                        </td>
                                                        <td>
                                                            {{
                                                                contact.created_at
                                                                    | timeformat
                                                            }}
                                                        </td> 
                                                     <td>
                                                            <a href="" @click.prevent = "deleteContact(contact.id)"
                                                                >Delete</a
                                                            >
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Name</th>
                                                        <th>Message</th>
                                                        <th>Created</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-5">
                                            <div
                                                class="dataTables_info"
                                                id="example2_info"
                                                role="status"
                                                aria-live="polite"
                                            >
                                                Showing 1 to 10 of 57 entries
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-7">
                                            <div
                                                class="dataTables_paginate paging_simple_numbers"
                                                id="example2_paginate"
                                            >
                                                <ul class="pagination">
                                                    <li
                                                        class="paginate_button page-item previous disabled"
                                                        id="example2_previous"
                                                    >
                                                        <a
                                                            href="#"
                                                            aria-controls="example2"
                                                            data-dt-idx="0"
                                                            tabindex="0"
                                                            class="page-link"
                                                            >Previous</a
                                                        >
                                                    </li>
                                                    <li
                                                        class="paginate_button page-item active"
                                                    >
                                                        <a
                                                            href="#"
                                                            aria-controls="example2"
                                                            data-dt-idx="1"
                                                            tabindex="0"
                                                            class="page-link"
                                                            >1</a
                                                        >
                                                    </li>
                                                    <li
                                                        class="paginate_button page-item"
                                                    >
                                                        <a
                                                            href="#"
                                                            aria-controls="example2"
                                                            data-dt-idx="2"
                                                            tabindex="0"
                                                            class="page-link"
                                                            >2</a
                                                        >
                                                    </li>
                                                    <li
                                                        class="paginate_button page-item"
                                                    >
                                                        <a
                                                            href="#"
                                                            aria-controls="example2"
                                                            data-dt-idx="3"
                                                            tabindex="0"
                                                            class="page-link"
                                                            >3</a
                                                        >
                                                    </li>
                                                    <li
                                                        class="paginate_button page-item"
                                                    >
                                                        <a
                                                            href="#"
                                                            aria-controls="example2"
                                                            data-dt-idx="4"
                                                            tabindex="0"
                                                            class="page-link"
                                                            >4</a
                                                        >
                                                    </li>
                                                    <li
                                                        class="paginate_button page-item"
                                                    >
                                                        <a
                                                            href="#"
                                                            aria-controls="example2"
                                                            data-dt-idx="5"
                                                            tabindex="0"
                                                            class="page-link"
                                                            >5</a
                                                        >
                                                    </li>
                                                    <li
                                                        class="paginate_button page-item"
                                                    >
                                                        <a
                                                            href="#"
                                                            aria-controls="example2"
                                                            data-dt-idx="6"
                                                            tabindex="0"
                                                            class="page-link"
                                                            >6</a
                                                        >
                                                    </li>
                                                    <li
                                                        class="paginate_button page-item next"
                                                        id="example2_next"
                                                    >
                                                        <a
                                                            href="#"
                                                            aria-controls="example2"
                                                            data-dt-idx="7"
                                                            tabindex="0"
                                                            class="page-link"
                                                            >Next</a
                                                        >
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
    </div>
</template>

<script>
export default {
    name: "List",
    mounted() {
        this.$store.dispatch("allContactFromDatabase");
    },
    computed: {
        getAllContact(){
            return this.$store.getters.getContactFromGetters;
        }
     
    },
    methods:{
        deleteContact(id){
            axios.delete(`contact/${id}`)
           .then(() => {
                    this.$store.dispatch("allContactFromDatabase");
                    Toast.fire({
                        icon: "success",
                        type: "success",
                        title: "Massage Deleted successfully"
                    });
                })
                .catch(() => {
                    console.log("Error........");
                });
        }
    }
};
</script>
