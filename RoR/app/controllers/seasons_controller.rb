class SeasonsController < ApplicationController

	def index
		@seasons=Season.all.order(seasonbegin: :asc)
	end

	def show
		@season= Season.find(params[:id])
	end

	def new
		@season=Season.new
		9.times { @season.games.build }
	end

	def create
		#binding.pry #no funcionó marca un error
		@season=Season.new(season_params)
		if @season.save
			redirect_to seasons_path
		else
			render 'new'
		end
	end

	def prediction
		@season=Season.find(params[:id])	
		
	end

	def edit
		@season= Season.find(params[:id])
	end	

	def results
		@season= Season.find(params[:id])		
	end	

	def update

		binding.pry
		@season= Season.find(params[:id])

		if @season.update(season_params)
			redirect_to seasons_path
			binding.pry
		else
			render 'edit'
			binding.pry
		end
	end	

	private
	def season_params
		params.require(:season).permit(:id,:name, :seasonbegin, :seasonend, games_attributes: [:id,:visitingteam_id,:scorelocalteam,:localteam_id,:scorevisitingteam,:game_at,predictions_attributes: [:id,:scorelocalteam,:scorevisitingteam]])
	end


end