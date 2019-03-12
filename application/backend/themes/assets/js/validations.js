$(document).ready(function () {

 $('#cancel_map')
            .formValidation({
                fields: {
                    reason: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Name can\'t be empty</font>'
                            }
                        }
                    } 
            }
 });
 $('#edit_map')
            .formValidation({
                fields: {
                    edit_reason: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Name can\'t be empty</font>'
                            }
                        }
                    }
            }
 });
	
 $('#send_email')
            .formValidation({
                fields: {
                    subject: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Subject can\'t be empty</font>'
                            }
                        }
                    },
					message: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Message can\'t be empty</font>'
                            }
                        }
                    }
                }
            });
  $('#form_categories_validation')
            .formValidation({
                fields: {
					color_code: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Color Code can\'t be empty</font>'
                            }
                        }
                    },

                    name: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Category name can\'t be empty</font>'
                            }
                        }
                    }
                }
            })
	.on('success.form.fv', function (e) {
		$("#loading").html('<div class="md-preloader pl-size-md"><svg viewBox="0 0 75 75"><circle cx="37.5" cy="37.5" r="33.5" class="pl-light-green" stroke-width="5"/></svg></div><h5>Please wait ...</h5>');
  });		
  $('#manually_location_form')
            .formValidation({
                fields: {
                    store_number: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Field store number can\'t be empty</font>'
                            }
                        }
                    },
                    store_type: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Field store type can\'t be empty</font>'
                            }
                        }
                    },
                    city: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Field city can\'t be empty</font>'
                            }
                        }
                    },
                    state: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Field state can\'t be empty</font>'
                            }
                        }
                    },
                    address: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Field address can\'t be empty</font>'
                            }
                        }
                    },
                    zip_code: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Field zip code can\'t be empty</font>'
                            }
                        }
                    },
                    phone_number: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Field phone number can\'t be empty</font>'
                            }
                        }
                    },
                    play_place: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Field play place can\'t be empty</font>'
                            }
                        }
                    },
                    drive_through: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Field drive through can\'t be empty</font>'
                            }
                        }
                    },
                    arch_card: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Field arch card can\'t be empty</font>'
                            }
                        }
                    },
                    free_wifi: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Field free wifi can\'t be empty</font>'
                            }
                        }
                    },
                    latitude: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Field latitude can\'t be empty</font>'
                            }
                        }
                    },
                    longitude: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Field longitude can\'t be empty</font>'
                            }
                        }
                    },
                    geo_accuracy: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Field geo accuracy can\'t be empty</font>'
                            }
                        }
                    },
                    country: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Field country can\'t be empty</font>'
                            }
                        }
                    },
                    country_code: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Field country code can\'t be empty</font>'
                            }
                        }
                    },
                    county: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Field county can\'t be empty</font>'
                            }
                        }
                    }
                }
            }).on('success.form.fv', function (e) {
		$("#loading").html('<div class="md-preloader pl-size-md"><svg viewBox="0 0 75 75"><circle cx="37.5" cy="37.5" r="33.5" class="pl-light-green" stroke-width="5"/></svg></div><h5>Please wait ...</h5>');


	  
	  
	});		
	
  $('#form_upload')
            .formValidation({
                fields: {
                    upload_file: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Please upload your file , this feild can\'t be empty</font>'
                            }
                        }
                    },
					existing_category: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Please select category , this feild can\'t be empty</font>'
                            }
                        }
                    }
					/*existing_category: {
						// All the email address field have emailAddress class
						selector: '.category_feild',
						validators: {
							callback: {
								message: 'You must select at least one feild in order to mention category',
								callback: function(value, validator, $field) {
									var isEmpty = true,
										// Get the list of fields
										$fields = validator.getFieldElements('category');
									for (var i = 0; i < $fields.length; i++) {
										if ($fields.eq(i).val() !== '') {
											isEmpty = false;
											break;
										}
									}

									if (!isEmpty) {
										// Update the status of callback validator for all fields
										validator.updateStatus('existing_category', validator.STATUS_VALID, 'callback');
										return true;
									}

									return false;
								}
							}
						}
					}*/	

                }
            }).on('success.form.fv', function (e) {
		$("#loading").html('<div class="md-preloader pl-size-md"><svg viewBox="0 0 75 75"><circle cx="37.5" cy="37.5" r="33.5" class="pl-light-green" stroke-width="5"/></svg></div><h5>Uploading , please wait ...</h5>');
  
	});
	
	
	
  $('#form_login')
            .formValidation({
                fields: {
                    username: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Field username can\'t be empty</font>'
                            }
                        }
                    },
                    password: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Field password can\'t be empty</font>'
                            }
                        }
                    }
                }
            });	

  $('#form_blog')
            .formValidation({
                fields: {
                    blog_title: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Field blog title can\'t be empty</font>'
                            }
                        }
                    },
                    blog_added_by: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Field can\'t be empty</font>'
                            }
                        }
                    },	
				
                    blog_content: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Field blog content can\'t be empty</font>'
                            }
                        }
                    }
                }
            });	

  $('#form_cms')
            .formValidation({
                fields: {
                    page_name: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Field page name can\'t be empty</font>'
                            }
                        }
                    },
                    blog_added_by: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Field can\'t be empty</font>'
                            }
                        }
                    },	
				
                    blog_content: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Field blog content can\'t be empty</font>'
                            }
                        }
                    }
                }
            });	
	
 $('#form_update_template_edit')
            .formValidation({
                fields: {
                    template_name: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Template name can\'t be empty</font>'
                            }
                        }
                    }, 
					subject: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Template subject can\'t be empty</font>'
                            }
                        }
                    },
                    description: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Template description can\'t be empty</font>'
                            }
                        }
                    }
                }
            });
 $('#faq_form')
            .formValidation({
                fields: {
                    faq_id: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Category can\'t be empty</font>'
                            }
                        }
                    }, 
					question: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Question can\'t be empty</font>'
                            }
                        }
                    },
                    answer: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Answer can\'t be empty</font>'
                            }
                        }
                    }
                }
            });	
	  $('#form_help_edit')
            .formValidation({
                fields: {
                    page_name: {
                        validators: {
                            notEmpty: {
                                message: 'Title can not be empty'
                            }
                        }
                    },
                    page_text: {
                        validators: {
                            notEmpty: {
                                message: 'Description can\'t be empty'
                            }
                        }
                    }
                }
            });		
		
	  $('#form_faq_category')
            .formValidation({
                fields: {
                    name: {
                        validators: {
                            notEmpty: {
                                message: 'Category name can\'t be empty'
                            }
                        }
                    }
                }
            });	

  $('#form_package')
            .formValidation({
                fields: {
                    name: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Field name can\'t be empty</font>'
                            }
                        }
                    },
                    price: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Field price can\'t be empty</font>'
                            }
                        }
                    },
                    type: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Field type can\'t be empty</font>'
                            }
                        }
                    },	
                    feature: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Field feature can\'t be empty</font>'
                            }
                        }
                    },		
                    description: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Field description can\'t be empty</font>'
                            }
                        }
                    }
                }
            });		
	
$('#home_features')
            .formValidation({
                fields: {
                    heading: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Field slide title can\'t be empty</font>'
                            }
                        }
                    },
                    image: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Field image can\'t be empty</font>'
                            }
                        }
                    },
                    description: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Field short description can\'t be empty</font>'
                            }
                        }
                    }		
                
                }
            });		
$('#edit_profile')
            .formValidation({
                fields: {
                    first_name: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Field first name can\'t be empty</font>'
                            }
                        }
                    },
                    last_name: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Field last name can\'t be empty</font>'
                            }
                        }
                    },
                    display_name: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Field display name can\'t be empty</font>'
                            }
                        }
                    },	
                    email: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Field email can\'t be empty</font>'
                            }
                        }
                    },		
                    about_myself: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Field about myself can\'t be empty</font>'
                            }
                        }
                    },	
                    fb_link: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Field facebook link can\'t be empty</font>'
                            }
                        }
                    },	
                    tw_link: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Field twitter link can\'t be empty</font>'
                            }
                        }
                    },	
                    linked_in_link: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Field Linked In link can\'t be empty</font>'
                            }
                        }
                    }
                }
                
                
            });		
	
$('#banners')
            .formValidation({
                fields: {
                    image: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Field slide title can\'t be empty</font>'
                            }
                        }
                    },
                    heading: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Field image can\'t be empty</font>'
                            }
                        }
                    },
                    description: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Field short description can\'t be empty</font>'
                            }
                        }
                    }		
                
                }
            });		
	
$('#home_video')
            .formValidation({
                fields: {
                    link: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Field slide title can\'t be empty</font>'
                            }
                        }
                    }	
                
                }
            });		
$('#example_video')
            .formValidation({
                fields: {
                    title: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Field slide title can\'t be empty</font>'
                            }
                        }
                    },
                    link: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Field image can\'t be empty</font>'
                            }
                        }
                    }	
                
                }
            });	
/*	
  $('#form_blog')
            .formValidation({
                fields: {
                    blog_title: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Field blog title can\'t be empty</font>'
                            }
                        }
                    },
					blog_content: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Field blog content can\'t be empty</font>'
                            }
                        }
                    },
	            blog_added_by: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Field can\'t be empty</font>'
                            }
                        }
                    },
	  	            blog_image: {
                        validators: {
                            notEmpty: {
                                message: '<font style="color:red;">Blog image can\'t be empty</font>'
                            }
                        }
                    }
                }

                }
	  
            })
	.on('success.form.fv', function (e) {
		$("#loader").html(' <div class="md-preloader pl-size-md"> <svg viewbox="0 0 75 75"> <circle cx="37.5" cy="37.5" r="33.5" class="pl-teal" stroke-width="5"/> </svg> </div>');
		// Prevent form submission
		e.preventDefault();
		// Get the form instance
		var $form = $(e.target);
		// Get the FormValidation instance
		var bv = $form.data('formValidation');
		// Use Ajax to submit form data
		$.post($form.attr('action'), $form.serialize(), function (result) {
			 if (result.result == 'success') {            				 
			 $("#loader").html('');
				 window.location.href = BASEURL + '/blogs';				 
				 var text = "success"	 
				 showNotification(colorName, text, placementFrom, placementAlign, animateEnter, animateExit);
			  
			}else if(result.result == 'error'){
				 $("#loader").html('');
				 $("#loader").html('<b style="color:red;">Their is some error updated template , please try again ! </b>');
				 $("#loader").fadeOut(5000).css("color","red").css("font-size","16px").css("text-shadow","0px 0px 50px black");
				
				 $("#loader").fadeIn();
			}
		}, 'json');
	});	
	*/
});

