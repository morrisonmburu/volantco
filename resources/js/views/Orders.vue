<style type="text/css">
    #grid{
        margin-right: auto;
        margin-left: auto;
    }

    @media (min-width: 769px) {
      #grid {
        width: 769px;
      }
    }
    @media (min-width: 1025px) {
      #grid {
        width: 1025px;
      }
    }
    @media (min-width: 1200px) {
      #grid {
        width: 1300px;
      }
    }
    
</style>
<template>

    <localization id="grid" :language="currentLocale.language">
        <intl :locale="currentLocale.locale" >
            <div>
                <pdfexport ref="gridPdfExport">
                    <Grid 
                    :style="{ height: '700px'}"
                    :sortable="sortable"
                    :filterable="filterable"
                    :groupable="groupable"
                    :reorderable="reorderable"
                    :pageable="{ buttonCount: 4, pageSizes: true }"
                    :data-items="dataResult"
                    :skip="skip" 
                    :take="take" 
                    :sort="sort" 
                    :group="group" 
                    :filter="filter" 
                    :columns="columns"
                    @datastatechange="dataStateChange"
                    :detail="detailComponent"
                    :expand-field="'expanded'"
                    @expandchange="expandChange"
                    @columnreorder="columnReorder"
                    :column-menu="columnMenu"
                    >
                    <toolbar>
                        <button
                        title="Export to Excel"
                        class="k-button"
                        @click="exportExcel"
                        style="color:#fff; background-color:#8F0236;"
                        >
                        Export to Excel
                    </button>&nbsp;
                    <button 
                    class="k-button"
                    @click="exportPDF"
                    style="color:#fff; background-color:#8F0236;"
                    >
                    Export to PDF
                </button>
            </toolbar>
        </Grid>
    </pdfexport>
</div>
</intl>
</localization>


</template>

<script>
import Vue from 'vue'
import { Grid, GridToolbar } from '@progress/kendo-vue-grid';
import { DropDownList } from '@progress/kendo-vue-dropdowns';
import { GridPdfExport } from '@progress/kendo-vue-pdf';
import { saveExcel } from '@progress/kendo-vue-excel-export';
import { IntlProvider, load, LocalizationProvider, loadMessages, IntlService } from '@progress/kendo-vue-intl';

import likelySubtags from 'cldr-core/supplemental/likelySubtags.json';
import currencyData from 'cldr-core/supplemental/currencyData.json';
import weekData from 'cldr-core/supplemental/weekData.json';

import numbers from 'cldr-numbers-full/main/es/numbers.json';
import currencies from 'cldr-numbers-full/main/es/currencies.json';
import caGregorian from 'cldr-dates-full/main/es/ca-gregorian.json';
import dateFields from 'cldr-dates-full/main/es/dateFields.json';
import timeZoneNames from 'cldr-dates-full/main/es/timeZoneNames.json';

load(
    likelySubtags,
    currencyData,
    weekData,
    numbers,
    currencies,
    caGregorian,
    dateFields,
    timeZoneNames
    );

import { process } from '@progress/kendo-data-query';

const DATE_FORMAT = 'yyyy/mm/dd hh:mm:ss.';
const intl = new IntlService();

const DetailComponent = {
    props: {
        dataItem: Object
    },
    components: {
        'Grid': Grid
    },
    template: `<div>
    <section :style='{ width: "200px", float: "left" }'>
        <p><strong>Description:</strong> {{dataItem.description}}</p>
        <p><strong>Device Ordered From:</strong> {{dataItem.device}}</p>
        <p><strong>Status:</strong> <v-chip :color="dataItem.status_color" text-color="#fff">{{ dataItem.status_name }}</v-chip></p>
    </section>
    <section style="width: 400px; padding-left: 100px;">
        <v-textarea
          solo
          name="input-7-4"
          label="Instructions"
          :value="dataItem.instructions"
        ></v-textarea>
    </section>
    <section style="position: relative; left: 40em; top:-13em;">
        <router-link :to="dataItem.route">
            <v-btn class="ma-2" tile outlined color="#8F0236" text-color="#fff">
              <v-icon left>remove_red_eye</v-icon> View Order
            </v-btn>
        </router-link>
    </section>
    </div>`
};

Vue.component('Grid', Grid);
Vue.component('pdfexport', GridPdfExport );
Vue.component('toolbar', GridToolbar);
Vue.component('dropdownlist', DropDownList);
Vue.component('intl', IntlProvider);
Vue.component('localization', LocalizationProvider);

export default{
    name: "orders",
    data: function () {
        return {
            
            skip: 0,
            take: 20,
            sort: [
                { field: 'order_id', dir: 'desc' }
            ],
            group: [
                { field: 'category' }
            ],
            filter: null,
            dataResult: [],
            orders: [],
            locales:  [
                {
                    language: 'en-US',
                    locale: 'en'
                },
            ],
            currentLocale: null,
            sortable: true,
            filterable: true,
            groupable: true,
            reorderable: true,
            detailComponent: DetailComponent,
            columnMenu: true,
            columns: [
                { field: "delivery_datetime", title: "Delivery DateTime", filter: "date", width: "250px"},
                { field: "destination", title: "To", filter: "text", width: "280px" },
                { field: "origin", title: "From", filter: "text", width: "280px"},
                { field: "package_price", title: "Amount In Ksh", filter: "numeric", width: "200px" },
                { field: "name", title: "Pakcage Name", filter: "text", width: "200px" },
                { field: "distance", title: "Distance In Kms", filter: "numeric", width: "200px"},
                { field: "stops_count", title: "No. of Stops", filter: "numeric", width: "200px" },
                { field: "order_id", title: "Order Id", title: "ID", width: "90px", locked: "true"},
            ]
        };
    },
    methods: {
        createAppState: function(dataState) {
            this.take = dataState.take;
            this.skip = dataState.skip;
            if (dataState.group) {
                dataState.group.map(group => group.aggregates = this.aggregates);
            }
            this.group = dataState.group;
            this.filter = dataState.filter;
            this.sort = dataState.sort;
        },
        dataStateChange (event) {
            this.createAppState(event.data);
            this.dataResult = process(this.orders, {
                skip: this.skip,
                take: this.take,
                sort: this.sort,
                filter: this.filter,
                group: this.group
            });
        },
        expandChange (event) {
            const isExpanded =
                event.dataItem.expanded === undefined ?
                    event.dataItem.aggregates : event.dataItem.expanded;

                    let status = ''
                    let status_color = ''
                    if (event.dataItem.status === 0) {
                        status = 'Unassigned'
                        status_color = 'red darken-4'
                    }else if(event.dataItem.status === 1){
                        status = 'Accepted'
                        status_color = 'indigo'
                    }else if(event.dataItem.status === 2){
                        status = 'Picked Up'
                        status_color = 'teal'
                    }else if(event.dataItem.status === 3){
                        status = 'In Transit'
                        status_color = 'cyan'
                    }else if(event.dataItem.status === 4){
                        status = 'Completed'
                        status_color = 'green'
                    }else if(event.dataItem.status === 5){
                        status = 'Cancelled'
                        status_color = 'red'
                    }
            event.dataItem.status_name = status
            event.dataItem.status_color = status_color
            event.dataItem.route = 'view_order/'+event.dataItem.order_id

            Vue.set(event.dataItem, 'expanded', !isExpanded);
        },
        exportExcel () {
            saveExcel({
                data: this.orders,
                fileName: "myVolantOrdersFile",
                columns: this.columns
            });
        },
        exportPDF () {
            const tempSort = this.sort; 
            this.sort = null;
            this.$nextTick(()=>{
               (this.$refs.gridPdfExport).save(this.orders);
                this.sort = tempSort;
            })
        },
        pageChangeHandler: function(event) {
            this.skip = event.page.skip;
            this.take = event.page.take;
        },
        columnReorder: function(options) {
            this.columns = options.columns;
        },
        dropDownChange: function (e) {
             this.currentLocale = e.target.value;
        },
        processOrders(orders, dataState){
            console.log(orders);
            // this.dataResult = process(orders, dataState);
            this.dataResult = process(orders, dataState);

            console.log(this.dataResult)
        },
        vieworder: function(e){
            console.log('clicked')
        },
        // vieworder(id){
        //   let nextUrl = this.$route.params.nextUrl
        //   this.$router.push((nextUrl != null ? nextUrl : 'view_order/'+id))
        // },
    },
    created() {
        this.currentLocale = this.locales[0];
        const dataState = {
            skip: this.skip,
            take: this.take,
            sort: this.sort,
            group: this.group
        };

        this.user = JSON.parse(localStorage.getItem('volant.user'))
        let user_id = this.user.id

        axios.defaults.headers.common['Content-Type'] = 'application/json'
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('volant.jwt')
        // let orders = []
        axios.post(`/api/getorders`, {user_id: user_id}).then(response => {
        let data = []
        Object.values(response.data).forEach((value) => {
          data.push(value);
          this.orders.push(value);
          this.loading = false
        })
        this.processOrders(data, dataState)
        })
    },
}
</script>