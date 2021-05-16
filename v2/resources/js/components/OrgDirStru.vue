<template>
  <div class="form-row">

    <div class="form-group col">
      <label for="organisme">Organisme <span class="text-danger">*</span></label>
      <select id="" :class="orgerror=='' ? 'form-control' : 'form-control is-invalid'"  name="organisme" ref="organisme" @change="getDrs('clicked')">
          <option value="">Séléctionner L'organisme</option>
          <option  v-for="or in organismes"  :key="or.id" :value="or.id" :selected="org==or.id">{{ or.nom }}</option>
      </select>
    </div>


    <div class="form-group col">
      <label for="dr">Direction <span class="text-danger">*</span></label>
      <select id="" :class="nomdrerror=='' ? 'form-control' : 'form-control is-invalid'" name="nom_dr" ref="dr" @change="getStructures('clicked')">
           <option value=""> Sélectionner La Direction</option>
           <option v-for="direction in drs" :key="direction.id" :value="direction.id" :selected="nomdr==direction.id">{{ direction.nom }}</option>
      </select>
    </div>


    <div class="form-group col">
      <label for="agence">Structure <span class="text-danger">*</span></label>
      <select id="" :class="sterror=='' ? 'form-control' : 'form-control is-invalid'" name="structure">
          <option value="">Séléctionner La Structure</option>
          <option v-for="st in structures" :key="st.code_ag" :value="st.code_ag" :selected="str==st.code_ag" >{{ st.nom_ag}} ( {{ st.code_ag}} )</option> 
      </select>
    </div>


  </div>
</template>

<script>
export default {
    props : ['org','nomdr','str','orgerror','nomdrerror','sterror'],
    data () {
        return  {
            structures : [],
            organismes : [],
            drs:[],
        }
    },
    methods : {
        getOrganisme : function () {            
            
             axios.get('/api/getorganismes')
               .then(function (res) {
                   this.organismes = res.data
               }.bind(this))
        },  
        getDrs : function (clicked) { 
            let val = (this.org =='' ? this.$refs.organisme.value : this.org)
            if (clicked=='clicked') {
                val = this.$refs.organisme.value 
            }
            axios.get('/api/getdrs',{
                params : {
                    id : val
                }
            })
            .then (
                function (response) {
                    this.drs = response.data;
                }.bind(this)
            )
             
            
        },
        getStructures : function (clicked) {
            let val = (this.nomdr =='' ? this.$refs.dr.value : this.nomdr)
            if (clicked=='clicked') {
                val = this.$refs.dr.value 
            }
            axios.get('/api/getstuctures',{
                params : {
                    nomDr : val
                }
            })
            .then (
                function (response) {
                    this.structures = response.data;
                }.bind(this)
            )
             
            
        }
    },
    created : function () {
        this.getOrganisme()
        this.getDrs('unclicked')
         this.getStructures('unclicked')
        
        

    },
    mounted : function () {
        // if (this.$refs.organisme.value == '')
        //  this.getDrs()
        //  this.getStructures()
        console.log('ko'+this.org)
        
    }
}
</script>

<style>

</style>