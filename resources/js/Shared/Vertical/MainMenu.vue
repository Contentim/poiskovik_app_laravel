<template>
  <div>
    <div class="nav">

      <el-popover
        placement="right"
        :width="200"
        trigger="hover"
        content="Вернуться на главную"
      >
        <template #reference>
          <Link class="block leading-7 mb-6 text-center text-2xl font-bold gray_c" href="/" >
            <span class="flex justify-center"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="130" height="130" x="0px" y="0px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve" class="mb-3"><g><g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"><path fill="#2d3748" d="M2855.7,5011.4c-101.6-24.9-197.4-95.8-251-189.7c-49.8-82.4-53.7-109.2-59.4-343l-7.7-254.9h203.1h203.1V4425v201.2h3276.9h3276.9V1150v-3478.1l-789.5-5.8l-791.4-5.7l-107.3-53.7c-126.5-61.3-252.9-189.7-310.4-316.2c-40.3-86.2-42.1-116.9-47.9-879.6l-5.7-791.4H5193.6H2943.8V-3154v1226.4h-201.2h-203.1l5.8-1278.2l5.7-1280.1l53.7-90.1c34.5-59.4,84.3-109.2,143.7-143.7l90.1-53.7l2500.8-5.7l2500.8-3.8l1031,1031L9900-2722.8l-3.8,3727.2l-5.7,3727.2l-53.7,90.1c-34.5,59.4-84.3,109.2-143.7,143.7L9603,5019l-3343.9,3.8C4419.4,5022.9,2888.2,5019,2855.7,5011.4z"></path> <path fill="#fe5000" d="M4212.4,4183.5c-327.7-44.1-718.6-174.4-1008-337.3c-722.5-402.4-1222.6-1077-1412.3-1901c-51.7-218.5-69-722.5-36.4-965.8c47.9-358.4,170.5-724.4,339.2-1017.5l86.2-151.4l-994.6-998.4C78.9-2299.3,101.9-2268.7,100-2521.6c-1.9-239.5,109.2-431.2,316.2-546.1c93.9-51.8,118.8-57.5,285.5-57.5c153.3,0,195.5,7.7,268.3,46c57.5,28.8,412,369.8,1077,1032.9l990.7,986.9l228-116.9c251-130.3,538.5-231.9,802.9-285.5c237.6-46,791.4-46,1031,1.9c904.5,180.1,1632.7,730.1,2040.9,1540.7c398.6,797.2,398.6,1747.7-1.9,2541c-408.2,806.8-1140.2,1360.6-2029.4,1535C4913.8,4195,4409.8,4210.3,4212.4,4183.5z M4986.6,3773.4c889.2-153.3,1644.2-795.3,1924-1634.6c95.8-291.3,122.7-463.8,122.7-789.5c0-684.1-231.9-1245.6-714.8-1726.6c-329.6-329.6-691.8-538.5-1126.8-653.5c-214.6-57.5-245.3-61.3-590.2-61.3c-398.6-1.9-519.3,17.2-833.6,126.5C2955.3-678.1,2355.5,13.6,2175.4,876c-57.5,272.1-57.5,674.5,0,946.7c159.1,755,643.9,1391.2,1320.3,1728.5c162.9,82.4,479.1,185.9,666.9,220.4C4367.6,3807.9,4775.8,3809.8,4986.6,3773.4z"></path> <path fill="#d5d6d7" d="M4323.6,3351.8c-210.8-59.4-364.1-191.6-456.1-390.9c-46-95.8-51.7-134.1-57.5-385.2c-5.8-256.8-9.6-279.8-47.9-310.4c-36.4-28.7-42.2-51.7-40.2-182.1c0-164.8,53.7-316.2,161-450.3c30.7-38.3,74.7-118.8,97.7-176.3c21.1-59.4,69-151.4,105.4-207c51.7-74.7,61.3-101.6,42.2-115c-80.5-51.7-536.6-295.1-724.4-385.2c-253-120.7-360.3-216.5-458-412l-59.4-116.9l69-92c668.8-893,1941.2-1078.9,2834.2-413.9c172.5,128.4,360.3,321.9,461.8,475.2l67.1,101.6l-40.2,80.5c-76.7,151.4-201.2,262.5-400.5,356.4c-201.2,93.9-699.5,358.3-755,398.6c-30.7,24.9-28.7,32.6,32.6,122.6c36.4,53.7,80.5,139.9,97.8,189.7c36.4,103.5,30.6,92,136,251c139.9,208.9,185.9,509.7,86.3,576.8c-36.4,23-40.2,44.1-40.2,258.7c0,266.4-28.8,390.9-118.8,534.6c-78.6,122.7-189.7,214.6-320,264.5C4852.5,3380.6,4478.8,3394,4323.6,3351.8z"></path> <path fill="#2d3748" d="M3365.4-2128.8V-2330h1216.9h1216.8v201.2v201.2H4582.3H3365.4V-2128.8z"></path> <path fill="#2d3748" d="M3365.4-2943.2v-191.6h1216.9h1216.8v191.6v191.6H4582.3H3365.4V-2943.2z"></path> <path fill="#2d3748" d="M3365.4-3757.6v-201.2h1216.9h1216.8v201.2v201.2H4582.3H3365.4V-3757.6z"></path></g></g></svg></span> 
            <span class="block leading-7 mx-2 text-center text-2xl font-bold gray_c">
              {{$store.state.app_name_short}}
            </span>
          </Link>
        </template>
      </el-popover>

      <div class="mb-4">
        <span class="group flex items-center py-3 cursor-pointer" @click="returnVerticalBodyTextDefault"> 
          <el-icon size="25" class="mr-2" color="f00"><RefreshRight /></el-icon>
          <div :class="isUrl('') ? 'text-white' : 'text-black group-hover:text-indigo-900'">Вернуть основной шаблонный текст</div>
        </span>
      </div>

      <div class="mb-4">
        <span class="group flex items-center py-3 cursor-pointer" @click="returnVerticalFooterTextDefault">
          <el-icon size="25" class="mr-2"><RefreshRight /></el-icon>
          <div :class="isUrl('') ? 'text-white' : 'text-black group-hover:text-indigo-900'">Вернуть шаблонный текст контактов</div>
        </span>
      </div>
      
      <div class="mb-2">Кого разыскиваем?</div>
      <div class="mb-4">
        <el-select v-model="$store.state.search.selected_label" class="w-full" placeholder="Выберите" @change="changeSearchObject">
          <el-option
            v-for="item in $store.state.search.objects"
            :key="item.id"
            :label="item.label"
            :value="item.id" 
          />
        </el-select>
      </div>

      <div class="mb-2">Выбрать цвет рамки:</div>
      <div class="mb-4">
        <el-color-picker v-model="$store.state.color" show-alpha :predefine="$store.getters.getPredefineColors" @change="changeColor"/>
      </div>
    </div>

    <!-- <Link class="flex items-center flex-row content-center justify-center w-full py-2 px-3 rounded-md bg-pink_flambe text-white text-bold cursor-pointer hover:bg-very_peri" href="/logout" method="delete" as="button"><icon name="logout" class="block w-4 h-4 fill-white mr-2"></icon> <div>Выход</div></Link> -->
    
  </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'
import Icon from '@/Shared/Icon'

export default {
  components: {
    Icon,
    Link,
  },
  data() {
    return {
      // data
    }
  },
  computed: {
    
  },
  mounted() {
    
    if(!localStorage.selected_id){
      localStorage.selected_id = this.$store.getters.getSearchObjectID
    } else {
      this.$store.commit('changeSearchObject', localStorage.selected_id);
    }

    if(!localStorage.selected_label){
      localStorage.selected_label = this.$store.getters.getSearchObjectLabel
    }

    if(!localStorage.color){
      localStorage.color = this.$store.getters.getColor
    } else {
      this.$store.commit('changeColor', localStorage.color);
    }

  },
  methods: {
    isUrl(...urls) {
      let currentUrl = this.$page.url.substr(1)
      if (urls[0] === '') {
        return currentUrl === ''
      }
      return urls.filter((url) => currentUrl.startsWith(url)).length
    },
    changeSearchObject(selected) {
      if(!selected){
        localStorage.selected_id = this.$store.getters.selectDefaultId;
      } else {
        this.$store.commit('changeSearchObject', selected);
      }
    },
    changeColor(selected){
      this.$store.commit('changeColor', selected);
    },
    returnVerticalBodyTextDefault(){
      this.$store.commit('returnVerticalBodyTextDefault');
      document.getElementById("BodyEditor").querySelector('.ql-editor').innerHTML = this.$store.getters.getVerticalBodyText;
    },
    returnVerticalFooterTextDefault(){
      this.$store.commit('returnVerticalFooterTextDefault');
      document.getElementById("FooterEditor").querySelector('.ql-editor').innerHTML = this.$store.getters.getVerticalFooterText;
    }
  },
}
</script>

<style>
  .el-select {
    margin: 0;
  }
  .el-color-picker,
  .el-color-picker__trigger {
    width: 100%;
  }
</style>
