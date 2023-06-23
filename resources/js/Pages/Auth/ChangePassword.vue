<template>
  <Head title="Установление нового пароля" />
  <div class="flex items-center justify-center p-6 min-h-screen bg-red_cp">
    <div class="w-full max-w-md">
      <h1 class="text-3xl text-center font-bold text-white">
        Установление нового пароля
      </h1>
      <!-- <logo class="block mx-auto w-full max-w-xs fill-white" height="50" /> -->

      <div class="h-full p-6">
        <el-form
          ref="formRef"
          :model="form"
          label-width="100px"
          class="flex flex-col rounded-lg bg-white rounded-lg overflow-hidden"
          size="large"
          label-position="top"
        >
          <div class="flex flex-wrap p-8">
            <el-form-item
              label="Новый пароль"
              prop="password"
              class="pb-0 w-full pass-wrapper"
              :rules="[
                {
                  required: true,
                  message: 'Заполните поле',
                  trigger: 'blur',
                },
                {
                  min: 6,
                  message: 'Длина пароля - от 6 символов',
                  trigger: 'blur',
                },
              ]"
            >
              <el-input
                v-model="form.password"
                :type="[onPasswordHidden == true ? 'password' : 'text']"
                autocomplete="off"
              />
              <el-button
                class="absolute right-0"
                @click="tooglePasswordVisible"
                v-if="(onPasswordHidden == true)"
                ><el-icon><Hide /></el-icon
              ></el-button>
              <el-button
                class="absolute right-0"
                @click="tooglePasswordVisible"
                v-if="(onPasswordHidden == false)"
                ><el-icon><View /></el-icon
              ></el-button>
            </el-form-item>
            <el-form-item
              label="Повторите пароль"
              prop="password"
              class="pb-0 w-full pass-wrapper"
              style="margin-bottom: 0"
              :rules="[
                {
                  required: true,
                  message: 'Заполните поле',
                  trigger: 'blur',
                },
                {
                  min: 6,
                  message: 'Длина пароля - от 6 символов',
                  trigger: 'blur',
                },
              ]"
            >
              <el-input
                v-model="form.confirm_password"
                :type="[onPasswordHidden == true ? 'password' : 'text']"
                autocomplete="off"
              />
              <el-button
                class="absolute right-0"
                @click="tooglePasswordVisible"
                v-if="(onPasswordHidden == true)"
                ><el-icon><Hide /></el-icon
              ></el-button>
              <el-button
                class="absolute right-0"
                @click="tooglePasswordVisible"
                v-if="(onPasswordHidden == false)"
                ><el-icon><View /></el-icon
              ></el-button>
            </el-form-item>

            <div class="w-full text-right">
              <div
                class="inline-block leading-7 mt-2 mb-0 cursor-pointer select-none"
                @click="onGenPassword"
              >
                Сгенерировать пароль
              </div>
            </div>
          </div>
          <div class="flex justify-between w-full px-4 py-4 bg-gray-50 border-t border-gray-100">
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
            <el-button type="success" @click="change()" class="m-0">
              <el-icon class="mr-2">
                <Check />
              </el-icon>
              Изменить
            </el-button>
          </div>
        </el-form>
      </div>
    </div>

  </div>
</template>

<script>
import { reactive, ref } from "vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import axios from "axios";
import { FormInstance, ElNotification } from "element-plus";

import Logo from "@/Shared/Logo";

export default {
  components: {
    Head,
    Logo,
    Link,
  },
  data() {
    return {
      token: "",
      form: {
        email: "",
        password: "",
        confirm_password: "",
      },
      onPasswordHidden: true,
      dialogGenPassword: false,
    };
  },
  mounted() {
    let self = this;

    let path = document.location.pathname;
    let matches = path.match(/\/forgot-password\/(.*)/);
    self.token = matches[1];

    axios
      .get(`/email/${this.token}`)
      .then(function (response) {
        if (response.data.status == 200) {
          self.form.email = response.data.email;
        } else if (response.data.status == 400) {
          ElNotification({
            title: response.data.msg,
            type: "error",
          });
        } else {
          ElNotification({
            title: "Неизвестная ошибка.",
            type: "error",
          });
        }
      })
      .catch(function (error) {
        console.log(error);
      });
  },
  methods: {
    async change() {
      let self = this;

      if (this.form.password != this.form.confirm_password) {
        ElNotification({
          title: "Пароли не совпадают",
          type: "error",
        });
      } else {
        axios
          .put(`/forgot-password`, self.form)
          .then(function (response) {
            if (response.data.status == 200) {
              ElNotification({
                title: response.data.msg,
                type: "success",
              });
              self.$inertia.visit("/login");
            } else if (response.data.status == 400) {
              ElNotification({
                title: response.data.msg,
                type: "error",
              });
            } else {
              ElNotification({
                title: "Неизвестная ошибка. Данные не изменены",
                type: "error",
              });
            }
          })
          .catch(function (error) {
            console.log(error);
            ElNotification({
              title: error.response.data.message,
              type: "error",
            });
          });
      }
    },
    tooglePasswordVisible() {
      this.onPasswordHidden = !this.onPasswordHidden
    },
    onGenPassword() {
        this.onPasswordHidden = false
        this.form.password = this.form.confirm_password = this.genString(10)
    },
    genString(length) {
      let result = "";
      let characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
      let charactersLength = characters.length;
      for (let i = 0; i < length; i++) {
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
.el-form--label-top .pass-wrapper .el-input__inner {
  padding-right: 50px;
}
</style>
