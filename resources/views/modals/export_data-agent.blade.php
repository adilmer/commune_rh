 <!-- Modal -->
 <div class="modal fade " id="modal-export_agent"  tabindex="-1" role="dialog" aria-labelledby="modal-export_agent"
     aria-hidden="true">
     <div class="modal-dialog modal-lg  modal-dialog-centered"  role="document">
         <div class="modal-content">
             <form action="{{ route('agent.export') }}" method="get" enctype="multipart/form-data" >
                 {{ csrf_field() }}
                 <div class="modal-header bg-primary">
                     <h6 class="modal-title text-uppercase"><i class="la la-hospital-o"></i> Exporter les données </h6>
                     <button type="button" class="close btn btn-outline-light" data-bs-dismiss="modal" aria-bs-label="Close">
                         <span aria-bs-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <div class="modal-body">
                        <label class="form-chek-label m-2 btn btn-outline-light text-dark">
                            <input class="form btn " type="checkbox" id="select_all" onclick="select_all(this)" >
                            <span class="form-chck-sign">Tout sélectionner</span>
                        </label>
                         <hr>
                            <label class="form-check-label m-2">
                                <input class="form-check-input" type="checkbox" name="names[]" value="agents.ppr as PPR">
                                <span class="form-check-sign">PPR</span>
                            </label>
                            <label class="form-check-label m-2">
                                <input class="form-check-input" type="checkbox" name="names[]" value="agents.cin as CIN">
                                <span class="form-check-sign">CIN</span>
                            </label>

                            <label class="form-check-label m-2">
                                <input class="form-check-input" type="checkbox" name="names[]" value="agents.sexe as Sexe">
                                <span class="form-check-sign">Sexe</span>
                            </label>
                            <label class="form-check-label m-2">
                                <input class="form-check-input" type="checkbox" name="names[]" value="provinces.nom as Province">
                                <span class="form-check-sign">Province</span>
                            </label>
                            <hr>
                            <label class="form-check-label m-2">
                                <input class="form-check-input" type="checkbox" name="names[]" value="agents.nom_fr as Nom Fr">
                                <span class="form-check-sign">Nom (Francais)</span>
                            </label>

                            <label class="form-check-label m-2">
                                <input class="form-check-input" type="checkbox" name="names[]" value="agents.nom_ar as Nom Ar">
                                <span class="form-check-sign">Nom (َArabic)</span>
                            </label>

                            <label class="form-check-label m-2">
                                <input class="form-check-input" type="checkbox" name="names[]" value="agents.prenom_fr as Prenom Fr">
                                <span class="form-check-sign">Prenom (Francais)</span>
                            </label>

                            <label class="form-check-label m-2">
                                <input class="form-check-input" type="checkbox" name="names[]" value="agents.prenom_ar as Prenom Ar">
                                <span class="form-check-sign">Prenom (َArabic)</span>
                            </label>

                            <hr>

                            <label class="form-check-label m-2">
                                <input class="form-check-input" type="checkbox" name="names[]" value="specialites.nom as Specialite Fr">
                                <span class="form-check-sign">Specialite (Francais)</span>
                            </label>

                            <label class="form-check-label m-2">
                                <input class="form-check-input" type="checkbox" name="names[]" value="specialites.nom_ar as Specialite Ar">
                                <span class="form-check-sign">Specialite (َArabic)</span>
                            </label>

                            <label class="form-check-label m-2">
                                <input class="form-check-input" type="checkbox" name="names[]" value="grades.nom as Grades Fr">
                                <span class="form-check-sign">Grades (Francais)</span>
                            </label>

                            <label class="form-check-label m-2">
                                <input class="form-check-input" type="checkbox" name="names[]" value="grades.nom_ar as Grades Ar">
                                <span class="form-check-sign">Grades (َArabic)</span>
                            </label>

                            <label class="form-check-label m-2">
                                <input class="form-check-input" type="checkbox" name="names[]" value="corps.nom as Corps">
                                <span class="form-check-sign">Corps</span>
                            </label>
                            <hr>
                            <label class="form-check-label m-2">
                                <input class="form-check-input" type="checkbox" name="names[]" value="agents.date_entree as Date de recrutement">
                                <span class="form-check-sign">Date de recrutement</span>
                            </label>
                            <hr>
                            <label class="form-check-label m-2">
                                <input class="form-check-input" type="checkbox" name="names[]" value="p1.nom as Formation Sanitaire Affectation Fr">
                                <span class="form-check-sign">Formation Sanitaire Affectation (Francais)</span>
                            </label>

                            <label class="form-check-label m-2">
                                <input class="form-check-input" type="checkbox" name="names[]" value="p1.nom_ar as Formation Sanitaire Affectation Ar">
                                <span class="form-check-sign">Formation Sanitaire Affectation (َArabic)</span>
                            </label>
                            <hr>
                            <label class="form-check-label m-2">
                                <input class="form-check-input" type="checkbox" name="names[]" value="p2.nom as Formation Sanitaire Actuel Fr">
                                <span class="form-check-sign">Formation Sanitaire Actuel (Francais)</span>
                            </label>

                            <label class="form-check-label m-2">
                                <input class="form-check-input" type="checkbox" name="names[]" value="p2.nom_ar as Formation Sanitaire Actuel Ar">
                                <span class="form-check-sign">Formation Sanitaire Actuel (َArabic)</span>
                            </label>


                            <hr>
                            <label class="form-check-label m-2">
                                <input class="form-check-input" type="checkbox" name="names[]" value="agents.situation_fam as Situation familiale">
                                <span class="form-check-sign">Situation Familiale</span>
                            </label>

                            <label class="form-check-label m-2">
                                <input class="form-check-input" type="checkbox" name="names[]" value="agents.nbr_enfant as Nombre des enfants">
                                <span class="form-check-sign">Nombre des enfants</span>
                            </label>
                            <hr>
                            <label class="form-check-label m-2">
                                <input class="form-check-input" type="checkbox" name="names[]" value="agents.tel_one as Telephone 1 ">
                                <span class="form-check-sign">Telephone 1</span>
                            </label>

                            <label class="form-check-label m-2">
                                <input class="form-check-input" type="checkbox" name="names[]" value="agents.tel_two as Telephone 2 ">
                                <span class="form-check-sign">Telephone 2</span>
                            </label>

                            <label class="form-check-label m-2">
                                <input class="form-check-input" type="checkbox" name="names[]" value="agents.email as Email ">
                                <span class="form-check-sign">Email</span>
                            </label>

                            <label class="form-check-label m-2">
                                <input class="form-check-input" type="checkbox" name="names[]" value="agents.adresse as Adresse ">
                                <span class="form-check-sign">Adresse</span>
                            </label>
                            <hr>
                            <label class="form-check-label m-2">
                                <input class="form-check-input" type="checkbox" name="names[]" value="pos.nom as Position ">
                                <span class="form-check-sign">Position</span>
                            </label>

                            <label class="form-check-label m-2">
                                <input class="form-check-input" type="checkbox" name="names[]" value="agents.description as Description ">
                                <span class="form-check-sign">Description</span>
                            </label>
                     </div>
                     <div class="modal-footer">
                         <button type="submit" class="btn btn-success btn-round">Exporter</button>
                         <button type="button" class="btn btn-danger btn-round" data-bs-dismiss="modal">Fermer</button>
                     </div>
				 </div>
             </form>
         </div>
     </div>
 </div>

 <script>
    let vari  = document.getElementById('select_all');
    let names =  document.getElementsByName('names[]');

    vari.addEventListener('change',function(){

       if (this.checked==true) {
        for (let i = 0; i < names.length; i++) {
           names[i].checked = true;
        }
       } else {
        for (let i = 0; i < names.length; i++) {
           names[i].checked = false;
        }

       }


    })



 </script>
