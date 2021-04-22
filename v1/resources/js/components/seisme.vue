<template>
  <div>
    <div class="form-group">
      <label for="type_evn">Type d'évènement <span class="text-danger">*</span></label>
      <select class="form-control" id="type_evn" name="type_evenement" ref="type_evn" @click="pcsh1">
        <option selected disabled>Type d'évènement</option>
        
        <option v-for="typeEvent in typeEvents" :key="typeEvent.id" :value="typeEvent.libelle" >{{ typeEvent.libelle }}</option>

      </select>
    </div>
    <div class="p-4 form-group" ref="pc1" id="pc1" style="">
      <div class="form-group">
        <label for="description" class="form-control-label"><u></u> </label>   Informations sur le séisme 
        <div class=" p-4 bg-white mb-2 mt-2" style="border: solid 1px #999;"  v-for="(input,k) in inputs" :key="k">
           
            <div class="form-group">
            <label for="exampleFormControlSelect1">Source d'information N°{{k+1}} <span class="text-danger">*</span></label>
                <select class="form-control" id="exampleFormControlSelect1" name="source[]">
                    <option value="" selected disabled>Selectionner la source d'information</option>
                    <option v-for="sourceInfo in sourceInfos" :key="sourceInfo.id" :value="sourceInfo.abreviation">{{sourceInfo.abreviation}}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="magnitude" class=" form-control-label">Magnitude <span class="text-danger">*</span></label>
                <input type="text" id="magnitude" placeholder="Magnitude" class="form-control" name="magnitude[]" ref="magnitude" v-model="input.magnitude" required>
            </div>
            <div class="form-group">
                <label for="desc" class=" form-control-label">Localisation <span class="text-danger">*</span></label>
                <input type="text" id="desc" placeholder="Localisation" class="form-control" name="localisation[]" ref="description" v-model="input.description" required>
            </div>
            <div class="form-row">
                <div class="form-group col-6">
                    <label for="date" class=" form-control-label">Date <span class="text-danger">*</span></label>
                    <input type="date" id="date" placeholder="Date" class="form-control" name="date[]" ref="date" v-model="input.date" required>
                </div>
                <div class="form-group col-6">
                    <label for="heure" class=" form-control-label">Heure en (UTC+01:00) <span class="text-danger">*</span></label>
                    <input type="time" id="heure" placeholder="heure" class="form-control" name="heure[]" ref="heure" v-model="input.heure" required>
                </div>
            </div>
            
            <label for="description" class="form-control-label"><u></u> </label>   Coordonnées de l'épicentre pour le choc principal 
            <div class=" p-4 bg-white mb-2" style="border: solid 1px #999;">
            <div class="form-row">
                <div class="form-group col-4">
                    <label for="lattitude" class=" form-control-label">Lattitude </label>
                    <input type="text" id="lattitude" placeholder="Lattitude" class="form-control" name="lattitude[]" ref="lattitude" v-model="input.lattitude" required>
                    
                </div>
                <div class="form-group col-4">
                    <label for="Longitude" class=" form-control-label">Longitude </label>
                    <input type="text" id="Longitude" placeholder="Longitude" class="form-control" name="longitude[]" ref="Longitude" v-model="input.Longitude" required>
                </div>
                <div class="form-group col-4">
                    <label for="Profondeur" class=" form-control-label">Profondeur </label>
                    <input type="text" id="Profondeur" placeholder="Profondeur" class="form-control" name="profondeur[]" ref="Profondeur" v-model="input.profondeur" required>
                </div>
                </div>
            </div>
            
            
            
        </div>        
                
                 
                 
         <br>
        <button type="button" class="btn btn-sm btn-primary" title="ajouter une nouvelle source" @click="addRow"><i class="fas fa-folder-plus"></i></button>       
        <button type="button" class="btn btn-sm btn-danger" title="supprimer la dernière source" @click="delRow"><i class="fas fa-folder-minus"></i></button>       
      </div>
    </div>
  </div>
</template>

<script>
export default {
    data () {
        return {
            inputs : [
                {
                    source : '',
                    date : '',
                    heure : '',
                    description: '',
                    type_secouse: '',
                    magnitude: ''
                }
            ],
            sourceInfos : [],
            typeEvents : []
        }
    },
    methods : {
        pcsh1 : function () {
            let x = this.$refs.pc1
            let y = this.$refs.type_evn
            if (y.value!="Seisme") {
                x.classList.remove("hide")
            } else {
                x.classList.add("hide")
            }
            this.delRow()
        },
        addRow : function () {
            this.inputs.push({
                source : '',
                date : '',
                heure : '',
                description: '',
                type_secouse: '',
                magnitude: ''
          })
        },
        delRow : function () {
            if(this.inputs.length > 0)
                this.inputs.splice(this.inputs.length -1 , 1);
            console.log(this.inputs.length)
            
        },
        getSourceInfos : function () {
               axios.get('/api/getSourceInfos')
               .then(function (res) {
                   this.sourceInfos = res.data
               }.bind(this))
               
        },
        getTypeEvents : function () {
               axios.get('/api/getTypeEvents')
               .then(function (res) {
                   this.typeEvents = res.data
               }.bind(this))
               
        },
    },
    created : function () {
        this.getSourceInfos()
        this.getTypeEvents()
    }
};
</script>

<style scoped>
    #pc1 {
       transform: scaleY(0);
        transition: transform 400ms ease 0ms;
        transition: opacity 1s ease-out;
        opacity: 0;
        height: 0;
        overflow: hidden;
    }
    #pc1.hide {
        transform: scaleY(1);
        transition: transform 400ms ease 0ms;
        /* background-color: #e7e8ed; */
        border: solid 1px #999;
        opacity: 1;
        height: auto;        
    }
</style>