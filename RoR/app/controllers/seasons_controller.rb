class SeasonsController < ApplicationController

	def index
		@seasons=Season.all.order(seasonbegin: :asc)
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

	def show
		@season= Season.find(params[:id])
	end

	def edit
		@season= Season.find(params[:id])
	end	

	def update
		@season= Season.find(params[:id])

		if @season.update(season_params)
			redirect_to seasons_path
		else
			render 'edit'
		end
	end
	

	def results
		@season=Season.find(params[:id])
		@games=@season.games.build
	end

	private
	def season_params
		params.require(:season).permit(:name, :seasonbegin, :seasonend, games_attributes: [:id,:visitingteam_id,:scorelocalteam,:localteam_id,:scorevisitingteam,:game_at])
	end


end