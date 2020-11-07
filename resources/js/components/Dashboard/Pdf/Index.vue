<template>
  <div class="card card-primary mt-3">
    <div class="card-header">
      <h3 class="card-title">PDF List</h3>
      <div class="cart-total">
        <div class="btn btn-primary float-right">
          <router-link to="/create_pdf" class="text-white">New</router-link>
        </div>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
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
                  <th>photo</th>
                  <th>created</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr
                  role="row"
                  class="even"
                  v-for="(file, index) in getAllpdf"
                  :key="file.id"
                >
                  <td class="sorting_1" tabindex="0">{{ index + 1 }}</td>
                  <td>
                    <form v-on:submit.prevent="downloadFile(file)">
                  <button type="submit" class="btn btn-primary">Download</button>
                    </form>
                  </td>
                  <td>{{ file.created_at | timeformat }}</td>
                  <td>
             
                    <a href @click.prevent="deleteFile(file.id)">Delete</a>
              
                  </td>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <th>Id</th>
                  <th>photo</th>
                  <th>created</th>
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
            >Showing 1 to 10 of 57 entries</div>
          </div>
          <div class="col-sm-12 col-md-7">
            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
              <ul class="pagination">
                <li class="paginate_button page-item previous disabled" id="example2_previous">
                  <a
                    href="#"
                    aria-controls="example2"
                    data-dt-idx="0"
                    tabindex="0"
                    class="page-link"
                  >Previous</a>
                </li>
                <li class="paginate_button page-item active">
                  <a
                    href="#"
                    aria-controls="example2"
                    data-dt-idx="1"
                    tabindex="0"
                    class="page-link"
                  >1</a>
                </li>
                <li class="paginate_button page-item">
                  <a
                    href="#"
                    aria-controls="example2"
                    data-dt-idx="2"
                    tabindex="0"
                    class="page-link"
                  >2</a>
                </li>
                <li class="paginate_button page-item next" id="example2_next">
                  <a
                    href="#"
                    aria-controls="example2"
                    data-dt-idx="7"
                    tabindex="0"
                    class="page-link"
                  >Next</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
</template>

<script>
export default {
  name: "Pdf",
  data() {
    return {

    };
  },
  mounted() {
    this.$store.dispatch("allPDFFromDatabase");
  },
  computed: {
    getAllpdf() {
      return this.$store.getters.getPdfFormGetters;
    },
  },
  methods: {
    
    downloadFile(file){
        const config = {
        headers: {
          "content-type": "multipart/form-data",
        },
      };
      axios.get('/download/upload-folder/'+ 'resume.pdf', {responseType: 'arraybuffer'}).then(response=>{
  
        let blob = new Blob([response.data], {type:'application/*'})
        let link = document.createElement('a')
        link.href = window.URL.createObjectURL(blob)
        link.download = 'resume.pdf'
        link.click();
      })
    },
    deleteFile(id) {
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: "btn btn-success",
          cancelButton: "btn btn-danger",
        },
        buttonsStyling: false,
      });

      swalWithBootstrapButtons
        .fire({
          title: "Are you sure?",
          text: "You won't be able to revert this!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonText: "Yes, delete it!",
          cancelButtonText: "No, cancel!",
          reverseButtons: true,
        })
        .then((result) => {
          if (result.value) {
            axios.get("/delete/upload-folder/" + id);
            this.$store.dispatch("allPDFFromDatabase");
            swalWithBootstrapButtons.fire(
              "Deleted!",
              "Your file has been deleted.",
              "success"
            );
          } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
          ) {
            swalWithBootstrapButtons.fire(
              "Cancelled",
              "Your imaginary file is safe :)",
              "error"
            );
          }
        })

        .catch(() => {
          console.log("Error......");
        });
    },
  },
};
</script>
<style  scoped>

</style>