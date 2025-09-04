<template>
  <Head>
    <title>Kelas - Aplikasi Ujian Online</title>
  </Head>
  <div class="container-fluid mt-5 mb-5">
    <div class="row">
      <div class="col-md-8">
        <div class="row">
          <div class="col-md-3 col-12 mb-2">
            <Link href="/admin/classrooms/create" class="btn btn-md btn-primary w-100 border-0 shadow" type="button"
              ><i class="fa fa-plus-circle"></i> Tambah</Link
            >
          </div>
          <div class="col-md-9 col-12 mb-2">
            <form @submit.prevent="handleSearch">
              <div class="input-group">
                <input type="text" class="form-control border-0 shadow" v-model="search" placeholder="masukkan kata kunci dan enter..." />
                <span class="input-group-text border-0 shadow">
                  <i class="fa fa-search"></i>
                </span>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-1">
      <div class="col-md-12">
        <div class="card border-0 shadow">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table-bordered table-centered table-nowrap mb-0 table rounded">
                <thead class="thead-dark">
                  <tr class="border-0">
                    <th class="rounded-start border-0" style="width: 5%">No.</th>
                    <th class="border-0">Nama Kelas</th>
                    <th class="rounded-end border-0" style="width: 15%">Aksi</th>
                  </tr>
                </thead>

                <tbody class="mt-2">
                  <tr v-for="(classroom, index) in classrooms.data" :key="index">
                    <td class="fw-bold text-center">{{ ++index + (classrooms.current_page - 1) * classrooms.per_page }}</td>
                    <td>{{ classroom.title }}</td>
                    <td class="text-center"></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <Pagination :links="classrooms.links" align="end" />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
//import layout
import LayoutAdmin from "../../../Layouts/Admin.vue";

//import component pagination
import Pagination from "../../../Components/Pagination.vue";

//import Heade and Link from Inertia
import { Head, Link, router } from "@inertiajs/vue3";

//import ref from vue
import { ref } from "vue";

export default {
  //layout
  layout: LayoutAdmin,

  //register component
  components: {
    Head,
    Link,
    Pagination,
  },

  //props
  props: {
    classrooms: Object,
  },

  //inisialisasi composition API
  setup() {
    //define state search
    const search = ref("" || new URL(document.location).searchParams.get("q"));

    //define method search
    const handleSearch = () => {
      router.get("/admin/classrooms", {
        //send params "q" with value from state "search"
        q: search.value,
      });
    };

    //return
    return {
      search,
      handleSearch,
    };
  },
};
</script>

<style></style>
