class MapsController < ApplicationController
  before_action :admin_user, only: [:create, :destroy]
  
  def create
    @map = current_user.map.build(map_params)
    if @map.save
      flash[:success] = "Map created!"
      redirect_to root_url
    else
      @feed_items = []
      render 'static_pages/home'
    end
  end
  
  def destroy
    @map.destroy
    redirect_to root_url
  end

  private

    def map_params
      params.require(:map).permit(:content)
    end
  
    def correct_user
      @map = current_user.maps.find_by(id: params[:id])
      redirect_to root_url if @map.nil?
    end

    def admin_user
      redirect_to(root_path) unless current_user.admin?
    end
end
