<template>
  <div class="card card-primary mt-3">
    <div class="card-header">
      <h3 class="card-title">Tag List</h3>
      <div class="cart-total">
        <div class="btn btn-primary float-right">
          <router-link to="/create_tag" class="text-white">New</router-link>
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
                <tr>
                  <th>
                    <select v-model="select" @change="deletSelected">
                      <option value>Select</option>
                      <option value>Delete all</option>
                    </select>
                    <br />
                    <input type="checkbox" @click.prevent="selectAll" v-model="all_select" />
                    <span v-if="all_select == false">Check All</span>
                    <span v-else>Uncheck All</span>
                  </th>
                  <th>Sl</th>
                  <th>Name</th>
                  <th>Date</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr
                  role="row"
                  class="even"
                  v-for="(tag,
                            index) in getAllTag"
                  :key="tag.id"
                >
                  <td>
                    <input type="checkbox" v-model="tagItem" :value="tag.id" />
                  </td>
                  <td class="sorting_1" tabindex="0">{{ index + 1 }}</td>
                  <td>{{ tag.tag_name }}</td>
                  <td>
                    {{
                    tag.created_at
                    | timeformat
                    }}
                  </td>
                  <td>
                    <router-link :to="`edit_tag/${tag.id}`">Edit</router-link>|
                    <a href @click.prevent="deleteTag(tag.id)">Delete</a>
                  </td>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <th>Id</th>
                  <th>Tag Name</th>
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
                <li class="paginate_button page-item">
                  <a
                    href="#"
                    aria-controls="example2"
                    data-dt-idx="3"
                    tabindex="0"
                    class="page-link"
                  >3</a>
                </li>
                <li class="paginate_button page-item">
                  <a
                    href="#"
                    aria-controls="example2"
                    data-dt-idx="4"
                    tabindex="0"
                    class="page-link"
                  >4</a>
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
  data() {
    return {
      select: "",
      tagItem: [],
      all_select: false,
    };
  },
  name: "List",
  mounted() {
    this.$store.dispatch("allTagFromDatabase");
  },
  computed: {
    getAllTag() {
      return this.$store.getters.getTagFormGetters;
    },
  },
  methods: {
    deleteTag(id) {
      console.log("its ok");
      axios
        .delete(`tag/${id}`)
        .then(() => {
          this.$store.dispatch("allTagFromDatabase");
          Toast.fire({
            icon: "success",
            type: "success",
            title: "Tag Deleted successfully",
          });
        })
        .catch(() => {
          console.log("Error........");
        });
    },
    selectAll() {
      if (this.all_select == false) {
        this.all_select = true;
        for (var tag in this.getAllTag) {
          this.tagItem.push(this.getAllTag[tag].id);
        }
      } else {
        this.all_select = false;
        this.tagItam = [];
      }
    },
    deletSelected() {
      console.log(this.tagItem);
      axios.get("/deletetag/" + this.tagItem).then(() => {
        this.tagItam = [];
        this.$store.dispatch("allTagFromDatabase");
        Toast.fire({
          icon: "success",
          type: "success",
          title: "Tag Deleted successfully",
        });
      });
    },
  },
};
</script>

