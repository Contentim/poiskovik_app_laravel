<template>
  <div class="overflow-y-auto bg-gray-50 w-full">
    <Head :title="title" />

    <div
      class="flex items-center justify-between w-full text-sm bg-white border-b-4 border-solid px-6 py-0"
    >
      <div class="flex items-center flex-row py-4 z-10">
        <h1
          class="mr-4 flex flex-wrap content-center text-3xl font-bold text-gray_c"
        >
          {{ title }}
        </h1>

        <Link
          class="flex items-center flex-row mr-4 content-center py-2 px-3 rounded-md bg-green_cp text-white cursor-pointer"
          href="/users/create"
        >
          <el-icon class="mr-2" size="20">
            <Plus />
          </el-icon>
          <div>Создать нового пользователя</div>
        </Link>
      </div>

      <dropdown class="mt-1" placement="bottom-end">
        <template #default>
          <div class="group flex items-center cursor-pointer select-none">
            <div
              class="mr-1 text-gray-700 group-hover:text-indigo-600 focus:text-indigo-600 whitespace-nowrap"
            >
              <span>Навигация</span>
            </div>
            <el-icon size="25" class="ml-2">
              <ArrowDown />
            </el-icon>
          </div>
        </template>
        <template #dropdown>
          <div class="mt-2 py-2 text-sm bg-white rounded shadow-xl">
            <Link
              class="flex items-center px-6 py-2 hover:bg-gray-100 hover:text-black"
              href="/"
              ><el-icon size="25" class="mr-2" color="#fe5000">
                <HomeFilled />
              </el-icon>
              <span>Главная</span></Link
            >
            <Link
              class="flex items-center px-6 py-2 hover:bg-gray-100 hover:text-black"
              href="/horizontal"
              ><el-icon
                size="25"
                class="mr-2"
                color="#fe5000"
                style="transform: rotate(-90deg)"
              >
                <Document />
              </el-icon>
              <span>Горизонтальная</span></Link
            >
            <Link
              class="flex items-center px-6 py-2 hover:bg-gray-100 hover:text-black"
              href="/vertical"
              ><el-icon size="25" class="mr-2" color="#fe5000">
                <Document />
              </el-icon>
              <span>Вертикальная</span></Link
            >
            <Link
              class="flex items-center px-6 py-2 hover:bg-gray-100 hover:text-black"
              href="/watermark"
              ><el-icon size="25" class="mr-2" color="#fe5000">
                <Finished />
              </el-icon>
              <span>Поставить метку</span></Link
            >
            <el-divider border-style="dashed" class="el_divider" />
            <a
              class="flex items-center px-6 py-2 hover:bg-gray-100 hover:text-black"
              href="https://t.me/poiskovik_app"
              target="_blank"
              ><el-icon size="25" class="mr-2" color="#0088cc">
                <Promotion />
              </el-icon>
              <span>Написать в телеграм</span></a
            >
          </div>
        </template>
      </dropdown>
    </div>

    <div class="h-full">

      <!-- <pagination class="mt-6" :links="users.links" /> -->

      <!-- 
      <div class="grid content-center">
        <Link
          class="flex justify-start"
          href="/login"
          title="Вернуться к авторизации"
          style="margin-bottom: 0"
        >
        <el-icon class="mr-2"><ArrowLeft /></el-icon> <div>Вернуться</div>
        </Link>
      </div>
      -->
<pre>
  {{users}}
</pre>
      

      <div class="bg-white overflow-hidden border-b-4 border-solid p-4">
        <div>
          <el-input
            v-model="input2"
            class="w-50 m-2"
            size="large" 
            placeholder="Please Input"
            :prefix-icon="Search"
          />
        </div>
      </div>
      
      <div class="bg-white overflow-hidden border-b-4 border-solid">
        <table class="w-full whitespace-nowrap">
          <tr class="text-left font-bold">
            <th class="pb-4 pt-4 px-6"></th>
            <th class="pb-4 pt-4 px-6">Имя</th>
            <th class="pb-4 pt-4 px-6">E-mail</th>
            <th class="pb-4 pt-4 px-6">Роль</th>
            <th class="pb-4 pt-4 px-6"></th>
          </tr>
          <tr
            v-for="user in users"
            :key="user.id"
            class="hover:bg-gray-100 focus-within:bg-gray-100"
          >
            <td class="w-px border-t">
              <Link
                class="py-4 px-4"
                :href="`/users/${user.id}/edit`"
                tabindex="-1"
              >
                <el-icon color="#00a579" class="text-green_cp">
                  <EditPen />
                </el-icon>
              </Link>
            </td>
            <td class="px-4 py-4 border-t">
              {{ user.user_name }}
            </td>
            <td class="px-4 py-4 border-t">
              {{ user.email }}
            </td>
            <td class="px-4 py-4 border-t">
              {{ user.owner ? "Администратор" : "Пользователь" }}
            </td>
            <td class="w-px border-t">
              <el-icon
                color="#f65058"
                class="cursor-pointer"
                @click="toggleDialogRemove(user.id)"
              >
                <Delete />
              </el-icon>
            </td>
          </tr>

          <tr v-if="users.length === 0">
            <td class="px-6 py-4 border-t" colspan="4">
              Список пользователей пуст
            </td>
          </tr>
        </table>
      </div>
    </div>

    <el-dialog
      v-model="dialogRemove"
      title="Удаление пользователя"
      width="30%"
      center
    >
      <span> Вы действительно хотите удалить пользователя?</span>
      <template #footer>
        <span class="dialog-footer">
          <el-button @click="toggleDialogRemove">Отмена</el-button>
          <el-button type="primary" @click="removeUserConfirm">
            Подтвердить
          </el-button>
        </span>
      </template>
    </el-dialog>
  </div>
</template>

<script>
import { reactive, ref } from "vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import axios from "axios";
import { ElMessageBox, ElNotification, ElLoading } from "element-plus";
import { Search } from '@element-plus/icons-vue'

import Layout from "@/Shared/User/Layout";
import Dropdown from "@/Shared/Dropdown";
import SearchFilter from "@/Shared/SearchFilter";
import Pagination from '@/Shared/Pagination'

export default {
  components: {
    Head,
    Link,
    SearchFilter,
    Dropdown,
    Pagination
  },
  layout: Layout,
  props: {
    user: Object,
    filters: Object,
    users: Array,
  },
  data() {
    return {
      title: "Управление пользователями",
      dialogRemove: false,
      removed_user_id: null,
      users: this.users,
    };
  },
  mounted() {
    let self = this;

    document.addEventListener("visibilitychange", function() {
        if (document.hidden){
            console.log("Browser tab is hidden")
        } else {
            // get users
            axios
              .get(`/get_users_json`)
              .then(function (response) {
                console.log(response.data)
                if (response.data.status == 200) {
                  self.users = response.data.users                  
                }
              })
              .catch(function (error) {
                console.log(error);
              });
        }
    });

    console.log(this.users)
  },
  watch: {},
  methods: {
    toggleDialogRemove(id) {
      this.dialogRemove = !this.dialogRemove;

      if (this.dialogRemove == true) {
        this.removed_user_id = id;
      } else {
        this.removed_user_id = null;
      }
    },
    removeUserConfirm() {
      let self = this;

      axios
        .delete(`/users/${this.removed_user_id}`)
        .then(function (response) {
          console.log(response.data.users);

          if (response.data.status == 200) {
            ElNotification({
              title: "Успешно!",
              message: response.data.id,
              type: "success",
            });

            self.users = response.data.users;
          } else {
            ElNotification({
              title: "Произошла ошибка. Данные не сохранены",
              type: "error",
            });
          }
        })
        .catch(function (error) {
          console.log(error);
        });

      this.dialogRemove = false;
    },
    // reset() {
    //   this.form = mapValues(this.form, () => null)
    // },
  },
};
</script>
