<template>
  <div class="overflow-y-auto bg-gray-50 w-full">
    <Head title="Создать нового пользвателя" />

    <div
      class="flex items-center justify-between w-full text-sm bg-white border-b-4 border-solid px-6 py-0"
    >
      <div class="flex items-center flex-row pt-3 py-4 z-10">
        <h1
          class="mr-4 flex flex-wrap content-center text-3xl font-bold text-gray_c"
        >
          {{ title }}
        </h1>
      </div>

      <dropdown class="mt-1" placement="bottom-end">
        <template #default>
          <div class="group flex items-center cursor-pointer select-none">
            <div
              class="mr-1 text-gray-700 group-hover:text-indigo-600 focus:text-indigo-600 whitespace-nowrap"
            >
              <span>Навигация</span>
            </div>
            <el-icon size="25" class="ml-2"><ArrowDown /></el-icon>
          </div>
        </template>
        <template #dropdown>
          <div class="mt-2 py-2 text-sm bg-white rounded shadow-xl">
            <Link
              class="flex items-center px-6 py-2 hover:bg-gray-100 hover:text-black"
              href="/"
              ><el-icon size="25" class="mr-2" color="#fe5000"
                ><HomeFilled
              /></el-icon>
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
                ><Document
              /></el-icon>
              <span>Горизонтальная</span></Link
            >
            <Link
              class="flex items-center px-6 py-2 hover:bg-gray-100 hover:text-black"
              href="/vertical"
              ><el-icon size="25" class="mr-2" color="#fe5000"
                ><Document
              /></el-icon>
              <span>Вертикальная</span></Link
            >
            <Link
              class="flex items-center px-6 py-2 hover:bg-gray-100 hover:text-black"
              href="/watermark"
              ><el-icon size="25" class="mr-2" color="#fe5000"
                ><Finished
              /></el-icon>
              <span>Поставить метку</span></Link
            >
            <el-divider border-style="dashed" class="el_divider" />
            <a
              class="flex items-center px-6 py-2 hover:bg-gray-100 hover:text-black"
              href="https://t.me/poiskovik_app"
              target="_blank"
              ><el-icon size="25" class="mr-2" color="#0088cc"
                ><Promotion
              /></el-icon>
              <span>Написать в телеграм</span></a
            >
          </div>
        </template>
      </dropdown>
    </div>

    <div class="h-full p-6">
      <div class="max-w-3xl bg-white border-4 border-solid overflow-hidden">
        <el-form
          ref="formRef"
          :model="form"
          label-width="100px"
          class="flex flex-wrap"
          size="large"
          label-position="top"
        >
          <div class="flex flex-wrap p-8">
            <el-form-item
              label="Имя пользователя"
              placeholder="Имя пользователя"
              prop="user_name"
              :rules="[
                {
                  required: true,
                  message: 'Заполните поле Имя',
                  trigger: 'blur',
                },
                {
                  min: 5,
                  message: 'Длина текста от 5 символов',
                  trigger: 'blur',
                },
              ]"
              class="pb-0 pr-6 w-full lg:w-1/2"
            >
              <el-input v-model="form.user_name" autocomplete="off" />
            </el-form-item>

            <el-form-item
              label="Email"
              placeholder="Email"
              prop="email"
              :rules="[
                {
                  required: true,
                  message: 'Заполните поле Email',
                  trigger: 'blur',
                },
                {
                  type: 'email',
                  message: 'Введите корректный email',
                  trigger: ['blur', 'change'],
                },
              ]"
              class="pb-0 pr-6 w-full lg:w-1/2"
            >
              <el-input v-model="form.email" autocomplete="off" />
            </el-form-item>

            <el-form-item
              label="Пароль"
              prop="password"
              show-password
              :rules="[
                {
                  required: true,
                  message: 'Заполните поле Пароль',
                  trigger: 'blur',
                },
              ]"
              class="pb-0 pr-6 w-full lg:w-1/2 pass-wrapper"
            >
              <el-input
                v-model="form.password"
                type="password"
                autocomplete="off"
              />
              <el-button class="absolute right-0"
                ><el-icon><Hide /></el-icon
              ></el-button>
            </el-form-item>

            <el-form-item
              label="Роль"
              prop="owner"
              :rules="[
                {
                  required: true,
                  message: 'Выберите роль',
                  trigger: 'change',
                },
              ]"
              class="pb-0 pr-6 w-full lg:w-1/2"
            >
              <el-select
                v-model="owner_label"
                placeholder="Выберите роль"
                @change="changeOwner"
                class="w-full"
              >
                <el-option label="Администратор" value="true" />
                <el-option label="Пользователь" value="false" />
              </el-select>
            </el-form-item>
          </div>

          <div
            class="flex justify-end w-full px-4 py-4 bg-gray-50 border-t border-gray-100"
          >
            <el-button type="success" @click="create()" class="m-0"
              ><el-icon class="mr-2"><Check /></el-icon> Создать</el-button
            >
          </div>
        </el-form>
      </div>
    </div>
  </div>
</template>

<script>
  import { reactive, ref } from "vue";
  import axios from "axios";
  import { Head, Link } from "@inertiajs/inertia-vue3";
  import { FormInstance, ElNotification } from "element-plus";

  import Layout from "@/Shared/User/Layout";
  import Dropdown from "@/Shared/Dropdown";

  export default {
    components: {
      Head,
      Link,
      Dropdown,
    },
    layout: Layout,
    props: {
      user: Object,
    },
    remember: "form",
    data() {
      return {
        title: "Создание нового пользователя",
        form: {
          user_name: this.genString(10), //"", 
          email: this.genString(10) + '@'+ this.genString(5) + '.com', //"", 
          password: this.genString(10), //"", 
          owner: true, //"", 
        },
        owner_label: "",
      };
    },
    mounted() {
      
    },
    methods: {
      async create() {
        let self = this;
        this.$refs.formRef.validate(function (valid, fields) {
          if (valid) {
            axios
              .post("/users", {
                user_name: self.form.user_name,
                email: self.form.email,
                password: self.form.password,
                owner: self.form.owner,
              })
              .then(function (response) {
                if (response.data.status == 200) {
                  self.$inertia.visit("/users");
                  ElNotification({
                    title: response.data.msg,
                    type: "success",
                  });
                } else if (response.data.status == 400) {
                  ElNotification({
                    title: response.data.msg,
                    type: "error",
                  });
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
          } else {
            ElNotification({
              title: "Заполните поля верно",
              type: "error",
            });
            //console.log(fields);
            return;
          }
        });
      },
      changeOwner(selected) {
        this.form.owner = selected === "true";
      },
      store() {
        this.form.post("/users");
      },
      genString(length) {
        var result = "";
        var characters = "abcdefghijklmnopqrstuvwxyz";
        var charactersLength = characters.length;
        for (var i = 0; i < length; i++) {
          result += characters.charAt(
            Math.floor(Math.random() * charactersLength)
          );
        }
        return result;
      },
    },
  };
</script>

<style>
  .el-form-item__content .pass-wrapper {
    position: relative;
  }
</style>
