<template>
<div>
  <div class="form-group">
      <label for="type_evn">Type d'évènement <span class="text-danger">*</span></label>
      <select class="form-control" id="type_evn" name="type_evenement" ref="type_evn" @change="pcsh">
        <option disabled>Type d'évènement</option>
        <option value="Incendie" :selected="typeevenement=='Incendie'" >Incendie</option>
        <option value="Seisme" ref="seisme" :selected="typeevenement=='Seisme'" >Seisme</option>
        <option value="Inondation" :selected="typeevenement=='Inondation'" >Inondation</option>
        <option value="Glissement de terrain" :selected="typeevenement=='Glissement de terrain'" >Glissement de terrain</option>
      </select>
    </div>


    <div class="p-4 form-group" ref="pc1" id="pc1" >
      <div class="form-group">
        <label for="description" class="form-control-label"><u>Les sources sismologique</u> </label> <br>
                   
        <div class=" p-4 bg-white mb-2" style="border: solid 1px #999;" ref="source" v-for="(sourc,index) in sources" :key="sourc.id">
            <div class="form-group">
            <label for="exampleFormControlSelect1">Source d'information N°{{index+1}} <span class="text-danger">*</span></label>
                <select class="form-control" id="exampleFormControlSelect1" name="source[]">
                    <option value="" >Selectionner la source d'information</option>
                    <option v-for="sourceInfo in sourceInfos" :key="sourceInfo.id" :value="sourceInfo.abreviation" :selected="sourceInfo.abreviation==sourc.source">{{sourceInfo.abreviation}}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="magnitude" class=" form-control-label">Magnitude <span class="text-danger">*</span></label>
                <input type="text" id="magnitude" placeholder="Magnitude" class="form-control" name="magnitude[]" ref="magnitude" :value="sourc.magnitude" required>
            </div>
            <div class="form-group">
                <label for="desc" class=" form-control-label">Localisation <span class="text-danger">*</span></label>
                <input type="text" id="desc" placeholder="Localisation" class="form-control" name="localisation[]" ref="description" :value="sourc.localisation" required>
            </div>
            <div class="form-row">
                <div class="form-group col-6">
                    <label for="date" class=" form-control-label">Date <span class="text-danger">*</span></label>
                    <input type="date" id="date" placeholder="Date" class="form-control" name="date[]" ref="date" :value="sourc.date" required>
                </div>
                <div class="form-group col-6">
                    <label for="heure" class=" form-control-label">Heure en (UTC+01:00) <span class="text-danger">*</span></label>
                    <input type="time" id="heure" placeholder="heure" class="form-control" name="heure[]" ref="heure" :value="sourc.heure" required>
                </div>
            </div>
            
            <label for="description" class="form-control-label"><u></u> </label>   Coordonnées de l'épicentre pour le choc principal 
            <div class=" p-4 bg-white mb-2" style="border: solid 1px #999;">
            <div class="form-row">
                <div class="form-group col-4">
                    <label for="lattitude" class=" form-control-label">Lattitude </label>
                    <input type="text" id="lattitude" placeholder="Lattitude" class="form-control" name="lattitude[]" ref="lattitude" :value="sourc.lattitude" required>
                    
                </div>
                <div class="form-group col-4">
                    <label for="Longitude" class=" form-control-label">Longitude </label>
                    <input type="text" id="Longitude" placeholder="Longitude" class="form-control" name="longitude[]" ref="Longitude" :value="sourc.longitude" required>
                </div>
                <div class="form-group col-4">
                    <label for="Profondeur" class=" form-control-label">Profondeur </label>
                    <input type="text" id="Profondeur" placeholder="Profondeur" class="form-control" name="profondeur[]" ref="Profondeur" :value="sourc.profondeur" required>
                </div>
                </div>
            </div>
        </div>

    <div>
        <div class=" p-4 bg-white mb-2 " style="border: solid 1px #999;"  v-for="(input,k) in inputs" :key="k">
            <div class="form-group">
            <label for="exampleFormControlSelect1">Source d'information N°{{sources.lenght+k+1}} <span class="text-danger">*</span></label>
                <select class="form-control" id="exampleFormControlSelect1" name="source[]">
                    <option value="" >Selectionner la source d'information</option>
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
                    <label for="date" class=" form-control-label">Date en UTC <span class="text-danger">*</span></label>
                    <input type="date" id="date" placeholder="Date" class="form-control" name="date[]" ref="date" v-model="input.date" required>
                </div>
                <div class="form-group col-6">
                    <label for="heure" class=" form-control-label">Heure <span class="text-danger">*</span></label>
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
    </div>
                
                
                 
                 
         
        <button type="button" class="btn btn-sm btn-primary" title="ajouter une nouvelle source" @click="addRow"><i class="fas fa-folder-plus"></i></button>       
        <button type="button" class="btn btn-sm btn-danger" title="supprimer la dernière source" @click="delRow"><i class="fas fa-folder-minus"></i></button>       
      </div>
    </div>
    </div>

    
</template>

<script>
export default {
    props : ['typeevenement','id'],
    data () {
        return {
            sources : [],
            sourceInfos : [],
            inputs : [
                {
                    source : '' ,
                    date : '' ,
                    heure : '' ,
                    description: '' ,
                    type_secouse: '' ,
                    magnitude: ''
                }
            ]
        }
    },
    methods : {
        getSources : function () {
            axios.get('/api/getSources',{
                params : {
                    id : this.id
                }
            })
            .then (
                function (response) {
                    this.sources = response.data;
                    console.log(this.sources)
                }.bind(this)
            )
        },
        // pushRow : function () {
        //     for (let i=0; i<this.sources.length ; ++i) {
        //         this.addRow()                
        //     }
        // },
        pcsh1 : function () {
            let x = this.$refs.pc1
            if (this.$refs.type_evn.value != 'Seisme') {
                x.classList.add("hide")
            } else {
                x.classList.remove("hide")
                this.delRow()
            }
        },
        pcsh : function () {
            let x = this.$refs.pc1
            if (this.$refs.type_evn.value != 'Seisme') {
                this.id = 0
                x.classList.add("hide")
            } else {
                x.classList.remove("hide")
                this.delRow()
            }
        },
        getSourceInfos : function () {
               axios.get('/api/getSourceInfos')
               .then(function (res) {
                   this.sourceInfos = res.data
               }.bind(this))
               
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
        rest : function () {
            // this.id = 0
            // this.sources = []
            if (this.$refs.value!='Seisme') {
                // this.id = 0
                this.sources = []
                this.$refs.pc1.style.display="none"              
            
            } else {
                console.log('test')
                this.$refs.pc1.style.display="flex"  
            }
            
            
        }
        
    },
    created : function () {
       this.getSources()

        
    },
    mounted : function () {
        this.pcsh1()
        this.getSourceInfos()
    }
    

}
</script>

<style scoped>
    .hide {
        display: none;
    }
</style>